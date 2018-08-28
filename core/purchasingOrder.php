<?php
	class purchasingOrder{
		public function add($status, $supplier, $currency, $warehouse, $budgetHolder, $shippingMode, $shipmentDate, $doneBy)
		{
			# adds a purchasing order
			global $conn;

			//checking purchasing order number and delivery note
			$purchNo = $this->nextOrderNumber();

			$query = $conn->query("INSERT INTO purchasing_orders(orderNumber, status, supplier, warehouse, currency, budgetHolder, shippingMode, shipmentDate, createdBy) VALUES (\"$purchNo\", \"$status\", \"$supplier\", \"$warehouse\", \"$currency\", \"$budgetHolder\", \"$shippingMode\", \"$shipmentDate\", \"$doneBy\") ") or trigger_error("Error with purchasing order issuance $conn->error");

			return $conn->insert_id;
		}
		public function addItem($product, $productUnitPrice, $productUnitMeasure, $productQuantity, $batchnumber, $manufacturer, $orderId, $doneBy)
		{
			# adds a purchasing order
			global $conn;
			$amount = $productUnitPrice*$productQuantity;
			$query = $conn->query("INSERT INTO purchasing_orders_items(productId, productUnitPrice, productUnitMeasure, productQuantity, batchNumber, manufacturer, orderId, amount, createdBy) VALUES (\"$product\", \"$productUnitPrice\", \"$productUnitMeasure\", \"$productQuantity\", \"$batchnumber\", \"$manufacturer\",  \"$orderId\", \"$amount\", \"$doneBy\") ") or trigger_error("Error with purchasing order issuance $conn->error");
			return $conn->insert_id;
		}

		public function addSupplierResponse($order, $status, $departureDate="", $arrivalDate="", $barcodeType="", $file="", $notes="", $doneBy)
		{
			# adds a purchasing order supplier's response
			global $conn;
			$query = $conn->query("INSERT INTO supplierasn(orderId, status, departureDate, arrivalDate, barcodeType, file, notes, createdBy) VALUES (\"$order\", \"$status\", \"$departureDate\", \"$arrivalDate\", \"$barcodeType\", \"$file\", \"$notes\", \"$doneBy\") ") or trigger_error("Error $conn->error");

			//ORDERS table
			$conn->query("UPDATE purchasing_orders SET status = 'confirmed', updatedBy = \"$doneBy\", updatedDate = NOW() WHERE id = \"$order\" ") or trigger_error($conn->error);

			return $conn->insert_id;
		}


		public function checkSupplierStatus($orderId){
			global $conn;

			$query = $conn->query("SELECT * FROM supplierasn WHERE orderId = \"$orderId\" ORDER BY id DESC LIMIT 1 ") or trigger_error($conn->error);
			if($query->num_rows){
				return $query->fetch_assoc();
			}else{
				return false;
			}
		}

		public function addASNItem($order, $orderItemId, $manufactureDate, $expiryDate, $doneBy)
		{
			# adds a purchasing order supplier's response
			global $conn;
			$query = $conn->query("INSERT INTO supplierasnitems(orderId, orderItem, manufacturedDate, expiryDate, createdBy) VALUES (\"$order\", \"$orderItemId\", \"$manufactureDate\", \"$expiryDate\", \"$doneBy\") ") or trigger_error("Error $conn->error");
			return $conn->insert_id;
		}

		public function items($orderId)
		{
			#order items
			global $conn;
			$query = $conn->query("SELECT * FROM purchasing_orders_items WHERE orderId = \"$orderId\" AND archived = 'no' ") or trigger_error("Error with purchasing order issuance $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}



		public function itemsStatics($orderId)
		{
			#order items
			global $conn;
			$query = $conn->query("SELECT SUM(amount) as totalAmount FROM purchasing_orders_items WHERE orderId = \"$orderId\" AND archived = 'no' ") or trigger_error("Error $conn->error");

			$res = $query->fetch_assoc();

			$data = array();

			$data['totalAmount'] = $res['totalAmount'];

			return $data;
		}



		public function details($orderId)
		{
			#order details
			global $conn;
			$query = $conn->query("SELECT * FROM purchasing_orders WHERE id = \"$orderId\" LIMIT 1 ") or trigger_error("Error with CROP details $conn->error");

			$data = $query->fetch_assoc();

			$data['items'] = $this->items($orderId);
			$data['totalAmount'] = $this->itemsStatics($orderId)['totalAmount'];
			return $data;
		}

		public function list()
		{
			# returns list of ORDERS
			global $conn;
			$query = $conn->query("SELECT * FROM purchasing_orders ORDER BY id DESC") or trigger_error("Error with order listing $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function listPending()
		{
			# returns list of pending purchase ORDERS
			global $conn;
			$query = $conn->query("SELECT * FROM purchasing_orders WHERE status = 'pending' ORDER BY id DESC") or trigger_error("Error with order listing $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function nextOrderNumber()
		{
			# return next order number
			global $conn, $dbName;
			$sql = "SELECT AUTO_INCREMENT as n FROM information_schema.TABLES WHERE TABLE_SCHEMA = \"$dbName\" AND TABLE_NAME = \"purchasing_orders\" ";
			$query = $conn->query($sql) or trigger_error("Error with purchasing_orders $conn->error");
			$data = $query->fetch_assoc();
			return $data['n'];
		}

		public function generateOrderNumber($type, $number)
		{
			if( $type == 'P' || $type == 'purchase'){
				$serial = (string)$number;

				for ($n=0; strlen($serial) < 4; $n++) { 
					$serial = "0".$serial;
				}
				return "POR$serial";
			}
		}



		public function listBudgetHolders()
		{
			# Adds crop in system
			global $conn;
			$query = $conn->query(" SELECT * FROM budgetHolders WHERE archived = 'no' ") or trigger_error("Error $conn->error");

			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function listCurrency($popularity=0)
		{
			# returns list of crop's variety
			global $conn;

			if($popularity>1){
				$popularity = 1;
			}

			$query = $conn->query("SELECT * FROM currency WHERE popularity >= \"$popularity\" ORDER BY popularity DESC ") or trigger_error("Error $conn->error");

			$varieties = array();

			while($data = $query->fetch_assoc()){
				$varieties[] = $data;
			};

			return $varieties;
		}

		public function supplierOrders($supplierId)
		{
			# returns list of ORDERS of $userId
			global $conn;
			$query = $conn->query("SELECT * FROM purchasing_orders WHERE supplier = \"$supplierId\" ORDER BY id DESC") or trigger_error("Error with order listing $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function ordersReceivingToday(){
			global $conn;
			$today = date(DB_DATE_FORMAT, strtotime(date("Y-m-d"))); //getting today's date with null time
			$sql = "SELECT P.* FROM supplierasn as S JOIN purchasing_orders as P ON S.orderId = P.id WHERE P.status = 'confirmed' AND S.arrivalDate = \"$today\" ";
			echo "$sql";
            $query = $conn->query($sql) or trigger_error($conn->error);
            return $query->fetch_all(MYSQLI_ASSOC);
		}
	}

	$POrder = new purchasingOrder();
?>
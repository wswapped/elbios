<?php
	class notification{
		public function add($userId, $title, $content, $type, $doneBy)
		{
			# adds a purchasing order
			global $conn;
			$sql = "INSERT INTO user_notifications(user, title, content, type, createdBy) VALUES (\"$userId\", \"$title\", \"$content\", \"$type\", \"$doneBy\") ";
			$query = $conn->query($sql) or trigger_error("Error $conn->error");
			return $conn->insert_id;
		}

		public function details($id)
		{
			global $conn;
			$query = $conn->query("SELECT * FROM user_notifications WHERE id = \"$id\" LIMIT 1 ") or trigger_error("Error $conn->error");
			$data = $query->fetch_assoc();
			return $data;
		}

		public function listUnread($userId)
		{
			# returns list of unread notifications
			global $conn;
			$sql = "SELECT * FROM user_notifications WHERE readStatus = 0 AND user = \"$userId\" ORDER BY createdDate DESC ";
			$query = $conn->query($sql) or trigger_error("Error $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function list($userId)
		{
			# returns list of all notifications
			global $conn;
			$sql = "SELECT * FROM user_notifications WHERE archived = 'no' AND user = \"$userId\" ORDER BY createdDate DESC ";
			$query = $conn->query($sql) or trigger_error("Error $conn->error");
			return $query->fetch_all(MYSQLI_ASSOC);
		}

		public function markRead($notificationId){
			//Mark the notification as read
			global $conn;

			$conn->query("UPDATE user_notifications SET readStatus = 1, readDate = NOW() WHERE id = \"$notificationId\" ") or trigger_error($conn->error);
			return true;
		}
	}
	$Notification = new notification();
?>
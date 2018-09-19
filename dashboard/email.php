    <!DOCTYPE html>
    <html>
    <head>
        <title>Intelliware email design</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <style type="text/css">
            *{
                padding: 0px;
                margin: 0;
                outline: none;
            }
            .nav
            {
                background: #0a70ff;
                padding: 10px;
                color: #fff;
                text-align: center;
                font-size: 120%;
            }
            .slogan{
                font-size: 60%;
                font-style: italic;
            }
            .container {
                padding: 2%;
                min-height: 75vh;
                background: #fffffff0;
                box-shadow: 0px -1px 10px 0px #1369e2;
            }
            @media screen and (min-width: 700px){
                .container{
                    max-width: 50%;
                    margin: 0 auto;
                }
                
            }
            footer {
                bottom: 2vh;
                left: 5%;
                text-align: center;
                background: #0a70ff;
                padding: 15px 2px;
                color: #ddd;
            }
            body{
                font-family: helvetica;
                background: url(http://backgroundcheckall.com/wp-content/uploads/2017/12/warehouse-background-13.jpg);
            }

            .bg-blur {
                background: rgba(0, 0, 0, 0.69);
            }
        </style>
    </head>
    <body>
        <div class="bg-blur">
            <div class="nav">
                <p>Intelliware</p>
                <small class="slogan">Intelligent and automatic warehouse system</small>
            </div>
            <div class="container">
                Hello We are testing this system for working
            </div>
            <footer>
                <ul style="list-style: none;">
                    <li>+250784762982</li>
                    <li>placidelunis@gmail.com</li>
                </ul>
                <p>Intelliware &copy; <?php echo date('Y'); ?></p>
            </footer>
        </div>
    </body>
    </html>
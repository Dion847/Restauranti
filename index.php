<?php include("header.php");?>
    <title>Flavor Haven Restaurant</title>
    <link rel="stylesheet" href="Css/Style.css">
</head>
<html>
<body>
    <main>
        <div class="bgfoto" id="bgfotoDiv" style="background-image: url(Css/burgeri1.jpg); background-size: 100% 100%;">
            <div class="text">
                <p>"Bite into joy with a burger."</p>
            </div>
        </div>
        <script>
            let i = 0;
            let bgfotoArray = ['Css/burgeri1.jpg', 'Css/burgeri2.jpg', 'Css/burgeri3.jpg'];
        
            function changeImg() {
                let bgfotoDiv = document.getElementById('bgfotoDiv');
        
                bgfotoDiv.style.backgroundImage = `url(${bgfotoArray[i]})`;
        
                if (i < bgfotoArray.length - 1) {
                    i++;
                } else {
                    i = 0;
                }
                setTimeout(changeImg, 2000);
            }
            window.onload = changeImg;
        </script>
        <br>
        <br>
        <h1>Our Best Selling Burgers</h1>
        <br>
        <div class="fotografit">
        <?php 
                include_once '../models/article.php';

                $article = new Article();

                $articles = $article->getArticles();

                foreach($articles as $article){ ?> 
                    <div class="rubrika">
                        <img src="../<?php echo $article["image"] ?>" alt="" class="img">
                        <div class="pershkrimi">
                            <p><?php echo $article["title"] ?></p>
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="rubrika">
                <img src="Css/Fotot/HamBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Classic Burger 3.50 £</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="Css/Fotot/ChickenBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Chicken Burger 4 £</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="Css/Fotot/FishBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Fish Burger 4 £</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="Css/Fotot/CheseBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Chesse Burger 4 £</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="Css/Fotot/BlackBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Premium Burger 5.50 £</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="Css/Fotot/MiniBurger.jpg" alt="" class="img">
                <div class="description">
                    <p>Mini Burger 2.50 £</p>
                </div>
            </div>
        </div>
    </main>
    <?php include("Footer.php");?>
</body>

</html>
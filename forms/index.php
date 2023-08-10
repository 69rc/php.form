<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="./styles.css">
    <title>user dash board</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Poppins:ital,wght@0,200;0,300;1,200&family=Roboto:ital,wght@0,100;1,100&display=swap');

  :root{
    --color--primary:#c8ccf5;
    --color-danger:#ff7782;
    --color-success:#41f1b6;
    ---color-warning:#ffbb55;
    --color-white:#fff;
    --color-info-dark:rgba(117, 123, 117, 0.867);
    --color-info-ligth:rgb(250, 245, 254);
    --color-dark:#363949;
    --color-ligth:rgb(132,139,200,0.18);
    --color-primary-variant:#111e88;
    --color-dark-variant:#677483;
    --color-background:#f6f6f9;
    


    --card-border-radius:2rem;
    --border-radius-1:0.4rem;
    --border-radius-2: 0.8rem;
    --border-radius-2: 1.2rem;

    --card-padding:1.8rem;
    --padding-1:1.2rem;

    --box-shadow:0 2rem 3rem (var(--color-ligth));
   
  }
  *{
    margin: 0;
    padding: 0;
    outline: 0;
    appearance: none;
    border: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;

  }
  html{
    font-size: 14px;

  }
  body{
    width: 100vh;
     box-sizing: border-box;
    height: 100vh;
    font-family: 'poppins',sans-serif;
    font-size: 0.88rem;
    background: var(--color-background);
    user-select: none;
    overflow-x: hidden;
    color: var(--color-dark);

  }


  a{
    color: var(--color-dark);

  }
  img{
    display: block;
    width: 100%;

  }
  h1{
    font-weight: 800;
    font-size: 1.8rem;
  }
  h2{
    font-size: 1.4rem;
  }
  h3{
    font-size: 0.87rem;
  }
  h4{
    font-size: 0.8rem;
  }
  h5{
    font-size: 0.77rem;
  }
  small{
    font-size: 0.75rem;
  }
  .container{
  display: grid;
  width: 96%;
   margin: 0 auto;
   gap: 1.8rem;
   grid-template-columns: 14rem auto 23rem;
  }
  .profile-photo{
    width: 2.8rem;
    height: 2.8rem;
    border-radius: 50%;
    overflow: hidden;
  }
  .text-muted{
    color: var(--color-info-dark);
  }

  p{
    color: var(--color-dark-variant);

  }
  b{
    color: var(--color-dark);
  }
  .primary{
    color:var(--color--primary)
  }
  .success{
    color:var(--color-success)
  }
  .warning{
    color:var(---color-warning)
  }
  aside{
    height: 100vh;
    

  }
  aside .top{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1.4rem;
  }
  aside.logo{
    display: flex;
    gap: o.8rem;
  }
  aside .logo img{
    width: 4rem;
    height: 2rem;
  }
  aside #close-btn{
    display: none;
  }


  aside .sidebar{
    
    display: flex;
    flex-direction: column;
    height: 86vh;
    position: relative;
    top: 3rem;
  }

  aside h3{
    font-weight: 500;

  }
  aside .sidebar a{
    display: flex;
    color: var(--color-info-dark);
    margin-left:2rem ;
    gap: 1rem;
    align-items: center;
    position: relative;
    height: 3.7rem;
    transition: all 300s ease;

  }
  aside.sidebar a h3{
    font-size: 1.6rem;
    transition: all 300s ease;
  }
 aside .sidebar a:last-child{
    position: absolute;
    bottom: 1rem;
    width: 100%;
  }
.sidebar a.active{
    background:var(--colo-ligth);
    color: var(--color--primary);
    margin-left:0 ;

}
.sidebar a.active:before{
    content: "";
    width: 6px;
    height: 100%;
    background: var(--color--primary);

}
.sidebar a.active.span{
    color: var(--color--primary);
    margin-left: calc(1rem -3px);

}
.sidebar a:hover{
    color: var(--color--primary);


}
.sidebar a:hover h3 {
    margin-left: 2rem ;

}
.sidebar span{
    background: var(--color-danger);
    color: var(--color-white);
    padding: 2px 10px;
    font-size: 11px;
    border-radius: var(--border-radius-1);
}


/*-------------------*/


main{
    margin-top: 1.4rem;
    
    

}
main.date{
    display: inline-block;
    background: var(--colo-ligth);
    border-radius: var(--border-radius-1);
    margin-top: 1rem;
    padding: 0.5rem 1.6rem;
}
.date input[type ='date']{
    background: transparent;
    color: var(--color-dark);
    

}
#insights{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 1.6rem;
    

}
   
 main .insights > div{
    background-color:var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    margin-top: 1rem;
    box-shadow:3px 3px 3px 3px rgb(132,139,200,0.18);
  


}
main .insights >div:hover{
  box-shadow: none;
}

main .insights > div span{
  background-color:var(--color--primary);
  padding: 0.5rem;
  border-radius: 50%;
  color: var(--color-white);
  font-size: 2rem;
  
}

main .insights >div.expenses span{
  background-color: var(--color-danger);


}
main .insights >div.income span{
  background-color: var(--color-success);


}
 .insights > div .middle{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
main .insights h3{
  margin: 1rem 0 0.6rem;
  font-size: 1rem;
}
main .insights .progress{
  position: relative;
  width: 92px;
  height: 92px;
  border-radius: 50%;
}
main .insights svg{
  width: 7rem;
  height: 7rem;
}
.insights svg circle{
  fill: none;
  stroke: var(--color--primary);
  stroke-width: 14;
  stroke-linecap: round;
  transform: translate(5px, 5px);
  stroke-dasharray: 110;
  stroke-dashoffset: 92;
}
main .insights .sales svg circle{
  stroke-dashoffset: -30;
  stroke-dasharray: 200;
}
main .insights .expenses svg circle{
  stroke-dashoffset: 20;
  stroke-dasharray: 80;
}
main .insights .income svg circle{
  stroke-dashoffset: 35;
  stroke-dasharray: 110;
}
main.insights.progress .number{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
main.insights small{
  margin-top: 1.3rem;
  display: block;
}
/*----------------------REcent-------*/
.recent-orders{
  margin-top:2rem ;
}
.recent-orders h2{
  margin-bottom: 0.8rem;
}
.recent-orders table{
  background: var(--color-white);
  width: 100%;
  border-radius: var(--card-border-radius);
  padding: var(--card-padding);
  text-align: center;
  box-shadow:3px 3px 3px 3px rgb(132,139,200,0.18); ;
  transition: all 300s ease;
}
main.recent-orders table:hover{
  box-shadow: none;
}
main table tbody td{
  height: 2.8rem;
  border-bottom: 1px solid var(--colo-ligth);
  color: var(--color-dark-variant);
}
main table tbody tr:last-child td{
  border: none;

}
main .recent-orders a{
  text-align: center;
  display: block;
  margin: 1rem auto;
  color: var(--color--primary);

}






</style>
<body >
    <!-- <div class="container">
        <h1>wellcome to dash borad</h1>
        <a href="logout.php" class="bt btn-warning">log out</a>
    </div>
     -->
     <div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="./img/logo.png" alt="">
                <h2>B <span class="danger">tech</span></h2>

            </div>
            
            <div class="close" id="close-btn">
                <span><i class='bx bx-x'></i></div>
                </span>
            </div>
        
        <div class="sidebar">
            
            <a href="" class="active" >
                <i class='bx bxs-dashboard'></i>
                <h3>Ourdashboard</h3>
            </a>
            
            <a href="">
                <i class='bx bxs-group'></i>
                <h3>customer</h3>
            </a>
            <a href="">
                <i class='bx bx-message'></i>
                <h3>Order</h3>
            </a>
            <a href="">
                <i class='bx bx-line-chart-down'></i>
                <h3>analysys</h3>
            </a>
            <a href="">
                <i class='bx bx-message'></i>
                <h3>message</h3>
                <span class="count">26</span>
            </a>
            <a href="">
                <i class='bx bxs-dashboard'></i>
                <h3>product</h3>
            </a>
            <a href="">
                <i class='bx bxs-dashboard'></i>
                <h3>report</h3>
            </a>
            <a href="">
                <i class='bx bx-cog'></i>
                <h3>settings</h3>
            </a>
            <a href="">
                <i class='bx bx-plus'></i>
                <h3>add product</h3>
            </a>
            <a href="" >
                <i class='bx bx-upload bx-rotate-270' ></i>
                <h3><a href="logout.php">log out</a></h3>
            </a>
            </div>
    </aside>
    <main>
        <h1>Dashboard</h1>

        <div class="date">
            <input type="date">
        </div>
        <div>
    
        <div class="insights" id="insights" >
            <div class="sales">
               <span> <i class='bx bx-line-chart'></i></span>
               <div class="middle">
                <div class="left">
                    <h3>total sales</h3>
                    <h1>$234,087</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx ='38' cy ='38' r="36" ></circle>
                    </svg>
                    <div class="number">
                        <p>81%</p>
                    </div>
                </div>
                <small class="text-muted">last 24 hrs</small>
               </div>
            </div>
               
               <!---ed of sales-->
            <div class="expenses">
               <span> <i class='bx bx-line-chart'></i></span>
               <div class="middle">
                <div class="left">
                    <h3>total expensis</h3>
                    <h1>$234,087</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx ='38' cy ='38' r="36" ></circle>
                    </svg>
                    <div class="number">
                        <p>44%</p>
                    </div>
                </div>
                <small class="text-muted">last 24 hrs</small>
               </div>
            </div>
               <!---ed of sales-->
            <div class="income">
               <span> <i class='bx bx-line-chart'></i></span>
               <div class="middle">
                <div class="left">
                    <h3>total income</h3>
                    <h1>$234,087</h1>
                </div>
                <div class="progress">
                    <svg>
                        <circle cx ='38' cy ='38' r="36" ></circle>
                    </svg>
                    <div class="number">
                        <p>50%</p>
                    </div>
                </div>
                <small class="text-muted">last 24 hrs</small>
               </div>
               </div>
               <!---ed of sales-->
            </div>
            </div>
   
</div>
</div>
</body>
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="./lib/jquery-3.7.0.min.js"></script>
     <script src="./lib/bootstrap.bundle.min.js.map"></script>
     <script src="./lib"></script> -->

</html>
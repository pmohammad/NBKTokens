
@import url('https://fonts.googleapis.com/css?family=Montserrat:500');
@import url('https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap');

body{
    background-color: #4481eb;
}



li, a, button{
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
}
header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
}
.nav__links{
    list-style: none;
}
.nav__links li{
    display: inline;
    padding: 0px 20px;
}
.nav__links li a {
    transition:all 0.3s ease 0s;
}
.nav__links li a:hover {
    color: #17233a
}

button{
    padding: 9px 25px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}
h1 {
    color: #fff;
    font-size: 37px;
    align-items: center;
}
h2 , h3 , h4 , h5, h6{
    color: #fff;
    /* display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px; */
    font-weight: bold;
}
.sign{
  color: black;
}

.typewriter h1 {
    color: #fff;
    font-family: monospace;
    overflow: hidden; 
    border-right: .15em solid orange;
    white-space: nowrap; 
    margin: 0 auto; 
    animation: 
      typing 3.5s steps(30, end),
      blink-caret .5s step-end infinite;
  }
  

  @keyframes typing {
    from { width: 0 }
    to { width: 100% }
  }
  

  @keyframes blink-caret {
    from, to { border-color: transparent }
    50% { border-color: orange }
  }

.container1{
  display: flex;
  justify-content: space-between;
  flex-direction: column;
  align-items: center;
  width: 300px;
  height: 630px;
  background-color: #54a3f0; 
  border-radius: 12%;
  
}

.child{
  justify-content: space-between;
  flex-direction: column;
  display: block;
  width: 50px;
  height: 100px;
  color: white;
  width: 300px;
  text-align: center;
  border-radius: 12%;
  
}
.card {
    display: grid;
    grid-template-columns: 300px;
    grid-template-rows: 210px 200px 100px;
    grid-template-areas: "image" "text" "stats";
    border-radius: 18px;
    background: white;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
    font-family: roboto;
    text-align: center;
    max-width: 300px;
  }

  .card-image {
    grid-area: image;
    background: url("../../img/test.png");
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    background-size: cover;
  }

.card-image {
    grid-area: image;
  }
  .card-text {
    grid-area: text;
  }
  .card-stats {
    grid-area: auto; 
  }
  .card-text {
    grid-area: text;
    margin: 25px;
  }
  .card-text .date {
    color: rgb(255, 7, 110);
    font-size:13px;
  }
  .card-text p {
    color: grey;
    font-size:15px;
    font-weight: 300;
  }
  .card-text h2 {
    margin-top:0px;
    font-size:28px;
  }
  .card-stats {
    grid-area: stats; 
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background: rgb(255, 7, 110);
  }
  .card-stats .stat {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: white;
    padding:10px;
  }
  .card:hover {
    transform: scale(1.15);
    box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
    border-bottom: 1px solid black;
  }
  .card {
    transition: 0.5s ease;
    cursor: pointer;
    margin:30px;
  }  

 .text{
   margin-left: 20px;
 }

 .input-group{
   padding: 100px;
   display: flex;
  justify-content: space-between;
  flex-direction: column;
  align-items: center;
  width: 600px;
  height: 1200px;
  /* background-color: #54a3f0;  */
  border-radius: 12%;
 }
  .input-row{
    display: flex;
   justify-content: space-between;
   flex-direction: column;
   align-items: center;
   width: 1200px;
   height: 230px;
   /* background-color: #54a3f0;  */
   border-radius: 12%;


  }
  
 
 .comment{
   color: white;
   text-align: center;
   
 }
.father{
  padding: 50px;
  display: flex;
 justify-content: space-between;
 flex-direction: column;
 align-items: center;
 /*width: 500px;*/
 height: 900px;
 border-radius: 3%;
 background-color: white;
 margin: 100px;
 box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
}
.chiled1{

  
  background-size: cover;

  justify-content: space-between;
  flex-direction: column;
  display: block;
  width: 50px;
  height: 100px;

  width: 300px;
  text-align: center;
  border-radius: 12%;
}
.rightman{
  background-size: cover;

  justify-content: space-between;
  flex-direction: row;
  display: block;
  width: 50px;
  height: 100px;

  width: 300px;
  text-align: center;
  border-radius: 12%;

}
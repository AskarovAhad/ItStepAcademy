

<h1 class="text-center">CONTACTS</h1>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md">
        <div class="contact shadow">
          <h4><i class="fab fa-whatsapp"></i><br>PHONE: <br><a href="#">+998 99 868 7116</a></h4>
        </div>
      </div>
      <div class="col-md">
        <div class="contact shadow">
          <h4><i class="far fa-envelope"></i><br>E-MAIL: <br><a href="#">aaskarov870@gmail.com</a></h4>
        </div>
      </div>
      <div class="col-md">
        <div class="contact shadow">
          <h4><i class="fas fa-map-marker-alt"></i><br>ADDRESS: <br><a href="#">Uzbekistan, Tashkent</a></h4>
        </div>
      </div>
    </div>
  </div>

  <style>
    body{
  background: #fff;
  height: 100vh;
}
a{
  text-decoration: none!important;
}
i{
  color: #28B463;
  font-weight: 600;
  font-size: 2rem;
  margin-right: 10px;
}
.contact{
  margin-top: 10px;
  padding: 15px;
  position: relative;
  border-left: 6px solid #28B463;
  transform: scale(1);
  background: #fff;
  transition: 1s;
  text-align: center;
}
.contact::before{
  content: '';
  position: absolute;
  background: #28B463;
  visibility: hidden;
  height: 3px;
  width: 100%;
  bottom: 0;
  left: 0;
  transform: scaleX(0);
  transition: .7s;
}
.contact:hover:before{
  visibility: visible;
  transform: scaleX(1);
}
.contact a:hover{
  color: #28B463!important;
}
.contact:hover{
  transform: scale(1.05);
}
  </style>

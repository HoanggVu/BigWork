<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap');

body {
    background-color: #f3f6fd;
    font-size: 11.5px;
    font-weight: bold;
    color: rgb(189, 196, 203);
}

.card {
    padding: 2% 7%;
    color: #646771;
    background-color: #16151a
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0
}

ul>li {
    padding: 4px
}

ul>li:hover {
    color: #957bda;
    cursor: pointer
}

hr {
    border-width: 3px
}

.social>i {
    padding: 1%;
    font-size: 15px
}

.social>i:hover {
    color: #957bda;
    cursor: pointer
}

.policy>div {
    padding: 4px
}

.heading {
    font-family: 'Titillium Web', sans-serif;
    color: white
}

.divider {
    border-top: 2px solid rgba(189, 196, 203, 0.5);
}
.foot{
    width: 120%;
    position: relative;
    left: -81px;

}
.rr>*{
    flex-shrink: 0;
    padding-right: calc(var(--bs-gutter-x)/ 2);
    padding-left: calc(var(--bs-gutter-x)/ 2);
    margin-top: var(--bs-gutter-y);
}
.rr{
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x)/ -2);
    margin-left: calc(var(--bs-gutter-x)/ -2);
}
</style>
<div class="foot">
    <div class="card mx-5">
        <div class="rr mb-4 ">
            <div class="col-md-4 col-sm-11 col-xs-11">
                <div class="footer-text pull-left">
                    <div class="d-flex">
                        <h1 class="font-weight-bold mr-2 px-3" style="color:#16151a; background-color:#957bda"> KN </h1>
                        <h1 style="color: #957bda">OFFICIAL</h1>
                    </div>
                    <p class="card-text">Sản phẩm được thiết kế bởi công ty KN Entertainment. Mọi thắc mắc xin liên hệ:</p>
                    <div class="social mt-2 mb-3"> 
                        <i class="fa fa-facebook-official fa-lg" onclick="fb()"></i>
                        <i class="fa fa-youtube-play fa-lg" onclick="yt()"></i> 
                        <i class="fa fa-twitter fa-lg"></i> 
                    </div>
                    <script type="text/javascript">
                        function fb(){
                            window.location.href = "https://www.facebook.com/profile.php?id=100007498090194";
                        }
                        function yt(){
                            window.location.href = "https://www.youtube.com/channel/UCD14XNiakoy4SRpEYg9nSVA";
                        }
                    </script>
                </div>
            </div>
            <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Dịch vụ</h5>
                <ul>
                    <li>Bán sữa</li>
                    <li>Cung cấp sữa</li>
                    <li>Ship sữa</li>
                    <li>Hỗ trợ về sữa</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Liên hệ</h5>
                <ul class="card-text">
                    <li>knofficial6@gmail.com</li>
                    <li>0366194799</li>
                    <li>144 Tố Hữu, Hải Châu, Đà Nẵng</li>
                    <li>Thanks for watching!</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Thành viên</h5>
                <ul class="card-text">
                    <li>Nguyễn Kim Khương</li>
                    <li>Nguyễn Lan Anh</li>
                    <li>Nguyễn Hoàng Vũ</li>
                </ul>
            </div>
        </div>
        <div class="divider mb-4"> </div>
        <div class="rr" style="font-size:10px;">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-left">
                    <p><i class="fa fa-copyright"></i> design by KN</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-right mr-4 d-flex policy">
                    <div>Terms of Use</div>
                    <div>Privacy Policy</div>
                    <div>Cookie Policy</div>
                </div>
            </div>
        </div>
    </div>
</div>
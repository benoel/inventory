<div class="sidebar">
    <ul>
        <li class="parent-menu">
            <div class="content-parent">
                <div class="icon">
                    <span class="glyphicon glyphicon-asterisk"></span>
                </div>
                <div class="parent">MASTER</div>
            </div>
            <ul class="child-menu">
                <li><a href="{{ url('barang') }}">Barang</a></li>
                <li><a href="{{ url('supplier') }}">Supplier</a></li>
                <li><a href="{{ url('outlet') }}">Outlet</a></li>
                <li><a href="{{ url('kategori') }}">Category</a></li>
                <li><a href="{{ url('unit') }}">Unit</a></li>
            </ul>
        </li>
        <li class="parent-menu">
            <div class="content-parent">
                <div class="icon">
                    <span class="glyphicon glyphicon-sort"></span>
                </div>
                <div class="parent">TRANSAKSI</div>
            </div>
            <ul class="child-menu">
                <li><a href="{{ url('barangmasuk') }}">Barang Masuk</a></li>
                <li><a href="{{ url('barangkeluar') }}">Barang Keluar</a></li>
                <li><a href="{{ url('barangrusak') }}">Barang Rusak/Retur</a></li>
            </ul>
        </li>
        <li class="parent-menu">
            <div class="content-parent">
                <div class="icon">
                    <span class="glyphicon glyphicon-book"></span>
                </div>
                <div class="parent">LAPORAN</div>
            </div>
            <ul class="child-menu">
                <li><a href="{{ url('reportbarangmasuk') }}">Lap. Barang Masuk</a></li>
                <li><a href="{{ url('reportbarangkeluar') }}">Lap. Barang Keluar</a></li>
                <li><a href="{{ url('reportbarangrusak') }}">Lap. Barang Rusak</a></li>
            </ul>
        </li>
        <li class="parent-menu">
            <div class="content-parent">
                <div class="icon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <div class="parent">SISTEM ADMIN</div>
            </div>
            <ul class="child-menu">
                <li><a href="{{ url('user') }}">Management User</a></li>
                <li><a href="{{ url('user/password') }}">Ganti Password</a></li>
                <li><a href="{{ url('logout') }}">Keluar</a></li>
            </ul>
        </li>
    </ul>
</div>

<style>
    .sidebar ul{
        list-style: none;
        padding-left: 0px;
    }
    .sidebar .icon, .sidebar .parent{
        display: inline-block;
    }
    .sidebar span{
        display: inline-block;
        top: -18px;
        left: 13px;
        margin-right: 26px;
    }

    .sidebar .icon{
        /*background-color: #DE6262;*/
        position: relative;
        top: -35px;
        height: 65px;
        width: 60px;
    }
    .sidebar .icon.active{
        background-color: #DE6262;
        color: #F7F6F2;
    }

    .icon span{
        display: inline-block;
        top: 23px;
        left: 17px;
        font-size: 25px;
    }

    .sidebar .parent{
        border-left: 1px solid #dbdcdb;
        height: 65px;
        left: -3px;
        position: relative;
        top: -20px;
        padding-top: 24px;
        padding-left: 13px;
    }
    .sidebar .content-parent{
        border-bottom: 1px solid #dbdcdb;
        height: 50px;
        padding-top: 11px;
        overflow: hidden;
    }

    .sidebar ul .parent-menu{
        /*height: 65px;*/
        position: relative;
        display: block;
        border-bottom: 1px solid #dbdcdb;
        overflow: hidden;
        padding: 0;
    }
    .sidebar ul li:hover{
        cursor: pointer;
    }
    .child-menu{
        padding-left: 15px;
        max-height: 0px;
        overflow: hidden;
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }
    .child-menu.show{
        opacity: 1;
        max-height: 300px;
    }
    .child-menu li{
        /*padding: 8px 8px 8px 75px;*/
        border-bottom: 1px solid #dbdcdb;
    }

    .child-menu li a{
        display: block;
        padding: 8px 8px 8px 75px;
    }
    .child-menu li a:hover{
        text-decoration: none;
        color: #DE6262;
    }


    .sidebar{
        position: fixed;
        height: 100%;
        width: 300px;
        border-right: 1px solid #dbdcdb;
        background-color: #F2F2EA;
        color: #737371;
        overflow-y: scroll;
    }
</style>
<script>
    $(document).ready(function(){
        $('.parent-menu').click(function(){
            var a = $(this).find('.icon').hasClass('active');
            var b = $('.parent-menu').find('.icon').hasClass('active');
            // if (a == true) {
            //     $(this).find('.child-menu').removeClass('show');
            //     $(this).find('.icon').removeClass('active');
            // }
            // else{
            //     $(this).find('.child-menu').addClass('show');
            //     $(this).find('.icon').addClass('active');
            // }
            if (b == true) {
                $('.parent-menu').find('.icon').removeClass('active');
                $('.parent-menu').find('.child-menu').removeClass('show');
                $(this).find('.child-menu').addClass('show');
                $(this).find('.icon').addClass('active');
            }else{
                $(this).find('.child-menu').addClass('show');
                $(this).find('.icon').addClass('active');
            }
            if (a == true) {
                $(this).find('.child-menu').removeClass('show');
                $(this).find('.icon').removeClass('active');
            }

        })

    })
</script>
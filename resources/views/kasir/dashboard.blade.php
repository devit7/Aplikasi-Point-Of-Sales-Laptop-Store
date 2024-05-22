@extends('layout.kasir_main')
@section('content')
<div class="batas">
            
            <div class="content" >
                <p class="ketegori">Pilih Kategori</p>

                <div class="Kategori mt-[10px]">

                    @for($k=1;$k<=20;$k++)
                    <button class="butKategori">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                        <p>Trending</p>
                    </button>
                    @endfor
                    
                </div>
                <div class="product">
                    <p>Products (18)</p>
                    <div class="allImage">
                        @for($i=1;$i<=20;$i++)
                        <div class="dProduct">
                            <div class="contPhoto">
                                <img src="https://i.pinimg.com/564x/cf/ae/5d/cfae5d59e0de794e1523bf4b662eced0.jpg" alt="">
                            </div>
                            <div class="nonPhoto">
                                <p class="nam">Macbook Pro 5 Oled</p>
                                <p class="Spes">1 TB | Core i 7 | Blue-White</p>
                                <div class="justGap">
                                <p></p>
                                <p class="harg">Rp. 27.000.000</p>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="tempStruct border-l border-[#33356F]">
                <div class="TopStruct h-[80px] border-b border-[#33356F] bg-[inherit]">
                    <p>Cart</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd" />
                    </svg>
                </div>
                
                <div class="ProductStruct">
                @for($j=1;$j<=20;$j++)
                    <div class="cardProduct border-b border-[#33356F] pt-1">
                        <div>
                            <div class="classImgTemp">
                                <img src="https://i.pinimg.com/564x/cf/ae/5d/cfae5d59e0de794e1523bf4b662eced0.jpg" alt="">
                                
                            </div>
                            <div class="leftTemp">
                                <p class="namTemp">Macbook Pro</p>
                                <p class="jenisTemp">Blue</p>
                                <div class="hargaQty">
                                    <p>Rp. 27.000.000</p>
                                    <div class="justGap">
                                        <p></p>
                                        <div class="PlusMinus">
                                            <button>-</button>
                                            <input type="text" name="" id="" value="4">
                                            <button>+</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endfor
                </div>
                <div class="DetilStruct">
                    <div class="Discount">
                        <p>Discount</p>
                        <div class="Rupiah" id="classRupiah" style="display:none;">
                            <p>Rp. </p>
                            <input type="text" id="forRupiah" >
                        </div>
                        <button onclick=toRupiah() id="addDisc">
                            <p>+  Add</p>
                        </button>
                    </div>
                    <div class="duit">
                        <div class="duit2">
                            <p>Tax</p>
                            <div class="Rupiah">
                                <p>Rp. </p>
                                <p>2.700.000</p>
                            </div>
                            
                        </div>
                        <div class="duit2">
                            <p>Total Amount</p>
                            <div class="Rupiah">
                                <p>Rp. </p>
                                <p>27.000.000</p>
                            </div>
                        </div>
                        <hr>
                        <div class="butArea">
                            <button class="clear">
                                <p>Clear Basket</p>
                            </button>
                            <button class="pay">
                                <p>Pay</p>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
</div>
        <script>
            document.getElementById('classRupiah').style.display="none";
            document.getElementById('forRupiah').addEventListener('input', function (e) {
                // Ambil nilai input
                let value = e.target.value;

                // Hilangkan karakter selain angka
                value = value.replace(/\D/g, '');

                // Format nilai dengan titik sebagai pemisah ribuan
                value = new Intl.NumberFormat('id-ID').format(value);

                // Masukkan nilai yang sudah diformat kembali ke input
                e.target.value = value;
            });
            function toRupiah(){
                let but = document.getElementById('addDisc');
                let inp = document.getElementById('classRupiah');
                
                inp.style.display="";
                but.style.display="none";
            }
            
        </script>
        <style>
            html::-webkit-scrollbar{
                width: 0;
                height: 0;
            }
            body{
                margin: 0 0;
                font-family: Arial, Helvetica, sans-serif;
                /* overflow-x: hidden; */
            }
            p{
                margin: 0 0;
                padding: 0 0;
            }
            div{
                margin: 0 0;
                padding: 0 0;
            }
            .batas{
                height: 100%;
                display: flex;
                flex-direction: row;
                color: #93A2D2;
                /* overflow: hidden; */
            }

            .sidebar{
                width: 3%;
                height: 100%;
                display: flex;
                flex-direction: column;
                position: fixed;
            }
            .content{
                margin-top: 20px;
                margin-left: 3%;
                display: flex;
                flex-direction: column;
                padding: 5px 20px;
                width: 67%;
                height: fit-content;
                align-items: center;
                justify-content: center;
                /* overflow-x: hidden; */
                /* overflow: hidden; */
            }
            .ketegori{
                padding: 0 0;
                margin: 0 0;
                margin-left: 30px;
                width: 100%;
                font-size: 20px;
                font-weight: 600;
            }

            
            .topBar{
                width: 95%;
                height: 5%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .topBar>div{
                
            }
            .leftTopBar{
                display: flex;
                flex-direction: row;
                gap: 10px;
                width: fit-content;
                align-items: center;
                justify-content: center;
                border: white 1px solid;
            }
            .leftTopBar>svg{
                width: 18px;
                height: 25px;
            }
            .leftTopBar>p{
                font-weight: 550;
            }
            .Search{
                width: 250px;
                height: 70%;
                display: flex;
                flex-direction: row;
                padding: 5px;
                margin: 5px;
                border-radius: 12px;
                gap: 4px;
                align-items: center;
                justify-content: center;
                background-color: inherit;
                border: #93A2D2 1px solid;
            }
            .Search>*{

            }
            .Search>svg{
                width: 10%;
                padding: 0 0;
                margin: 0 0;
                color: #93A2D2;
            }
            .Search>input{
                width: 80%;
                height: 100%;
                border: none;
                font-size: 17px;
                margin: 0 0;
                padding: 0 0;
                background-color: inherit;
                color: #93A2D2 ;
                
            }
            .Search>input:focus{
                border: none;
                outline: none;
            }

            .Kategori{
                width: 99%;
                height: 5%;
                padding: 10px 3px;
                display: flex;
                flex-direction: row;
                gap: 10px;
                overflow-x: auto;
            }
            .Kategori::-webkit-scrollbar{
                width: 0;
                height: 0;
            }
            .butKategori{
                margin-left: 20px;
                width: fit-content;
                height: 100%;
                display: flex;
                flex-direction: row;
                padding: 10px;
                border-radius: 15px;
                border: none;
                gap: 5px;
            }
            .butKategori:hover{
                background-color: #93A2D2;
                color:#0C0D1F;
            }
            .butKategori>svg{
                width: 14px;
            }
            .product{
                width: 100%;
                height: 90%;
                display: flex;
                flex-direction: column;
                background-color: inherit;
                overflow-y: auto;
            }
            .product>p{
                font-size: 20px;
                font-weight: 600;
                padding: 20px 20px;
            }
            .product>*{
                padding: 20px;
            }
            .allImage{
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                gap: 10px;
                
            }
            .dProduct{
                
                width: 368px;
                height: 250px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .justGap{
                display: flex;
                justify-content: space-between;
            }
            .contPhoto{
                width: 100%;
                height: 70%;
                overflow: hidden;
                border-radius: 10px;
            }
            .contPhoto>img{
                width: 100%;
                height: auto;
                object-fit: cover;
                object-position: center;
            }
            .nonPhoto{
                width: 90%;
                display: flex;
                flex-direction: column;
                gap: 0px;
                padding: 20px;

            }
            
            .nam,.harg{
                font-size: 16px;
            }
            .Spes{
                font-size: 12px;
                padding-bottom: 10px;
            }

            .tempStruct{
                padding: 10px 10px;
                padding-top: 0 !important;
                width: 23%;
                height: 100vh;
                /* border: white 1px solid; */
                position: fixed;
                z-index: 100;
                right: 0px;
                overflow-y: auto;
                overflow: hidden;
                background-color: #0C0D1F;
                /* background-color: #131432; */
            }
            .TopStruct{
                display: flex;
                flex-direction: row;
                gap: 6px;
                width: 100%;
                /* height: 80px; */
                align-items: center;
                justify-content: center;
                /* font-size: 15px; */
                
            }
            .TopStruct>svg{
                width: 12px;
                padding: 3px;
                background-color: rgb(223, 54, 138);
                border-radius: 10px;
                color: white;
            }
            .ProductStruct{
                padding-top: 8px;
                display: flex;
                flex-direction: column;
                gap: 2px;
                height: 68%;
                overflow-y: auto;
            }
            .ProductStruct::-webkit-scrollbar{
                width: 5px;
                opacity: 30%;
            }
            .ProductStruct::-webkit-scrollbar-thumb{
                
                background-color: #93A2D2;
                border:white;
                height: 0;
                border-radius: 20px;
                opacity: 20%;
            }
            .cardProduct{
                display: flex;
                flex-direction: column;
                height: 150px;
                gap: 3px;
            }
            
            .cardProduct>div{
                display: flex;
                flex-direction: row;
                width: 100%;
                height: 98%;
            }
            .cardProduct>div>.classImgTemp{
                height: 98%;
                width: 50%;
                overflow: hidden;
                border-radius: 5px;
            }
            .classImgTemp>img{
                height: 100%;
                width: 100%;
                height: auto;
                object-fit: cover;
                object-position: center;
            }
            .leftTemp{
                width: 50%;
                display: flex;
                flex-direction: column;
                padding: 10px;
                gap: 8px;
            }
            .leftTemp>*{
                width: 100%;
            }
            .namTemp{
                font-size: 15px;
            }
            .jenisTemp{
                font-size: 12px;
            }
            .hargaQty{
                display: flex;
                flex-direction: column;
                gap: 5px;
                height: 70%;
                justify-content: space-between;
            }
            .PlusMinus{
                display: flex;
                flex-direction: row;
            }
            .PlusMinus>button{
                width: 20px;
                height: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 6px;
                border: none;
                text-align: center;
                font-size: 15px;
                background-color: #131432;
            }
            .PlusMinus>button:hover{
                background-color: rgba(52, 52, 52, 0.723);
                color: white;
            }
            .PlusMinus>button:active{
                background-color: rgba(72, 72, 72, 0.723);
            }
            .PlusMinus>input{
                width: 30px;
                height: 20;
                border: none;
                text-align: center;
                background-color: inherit;
                font-size: 12px;
            }
            .PlusMinus>input:focus{
                border: none;
                outline: none;
            }
            .cardProduct>hr{
                padding: 0 0;
                margin: 0 0;
            }
            .DetilStruct{
                height: 100%;
                width: 100%;
                display: flex;
                flex-direction: column;
                padding: 10px;
                /* padding-right: 10px; */
                gap:8px;
                /* background-color: rgba(128, 128, 128, 0.236); */
            }
            .Discount{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .Discount>button{
                padding: 4px 20px;
                border-radius: 5px;
                background-color: rgba(111, 111, 111, 0.608);
                border: none;
                color: rgb(255, 255, 255);
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            .Discount>button:hover,.clear:hover{
                background-color: rgb(40, 40, 40);
            }
            .Discount>button:active,.clear:active{
                background-color: rgb(73, 73, 73);
            }
            .duit{
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            .duit>.duit2{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .Rupiah{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                width: 120px;
            }
            .Rupiah>input{
                color: #93A2D2;
                background-color: inherit;
                outline: none;
                border: none;
                text-align: right;
                width: 100%;
                padding: 4px 0;

            }
            .butArea{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .butArea>button{
                width: 49%;
                padding: 10px 40px;
                color: white;
                border-radius: 8px;
                border: none;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            .clear{
                background-color: rgba(111, 111, 111, 0.608);
            }
            .pay{
                background-color: rgb(214, 57, 83);
            }
            .pay:hover{
                background-color: rgb(164, 44, 64);
            }
            .pay:active{
                background-color: rgb(169, 69, 86);
            }
        </style>

@endsection

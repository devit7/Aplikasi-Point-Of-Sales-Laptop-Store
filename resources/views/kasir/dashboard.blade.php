@extends('layout.kasir_main')
@section('content')
<div class="deContent p-6">
    <div class="topSidebar h-[80px] text-center items-center flex justify-center border-b border-l border-[#33356F]">
        <h1 class="tgl font-semibold text-[15px] text-gray-500 m-0 p-0">Selasa, 12 May 2024 23.04</h1>
        <button class="butCheckout">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="butCheckout w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            <p>Checkout(18)</p>
        </button>
    </div>
    <div class="Notes mb-6">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Products List
                </p>
                <p class="text-[#6b6eb4] p-0 ">
                    A List of All of the Products
                </p>
            </div>
        </div>
	<div class="LiterallyContent max-w-7xl mx-auto">
		<div class="inline-block min-w-full py-2 align-middle">
			<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
			<div class="bg-[#1C1D42] rounded-md  border border-[#33356F] min-h-[500px]">
            <div class="flex flex-row justify-between px-4 py-6">
                <input type="text" class="w-[300px] bg-[#1C1D42] text-white border-2 border-[#33356F] p-2 rounded-md"
                    placeholder="Search">
                <div class="flex flex-row gap-2">
                    <button class="bg-[#aa5800] text-white px-2  rounded-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div
                        class="flex items-center  rounded-md flex-row gap-2 bg-[#1C1D42] text-[#6b6eb4] border-2 border-[#33356F] px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                        </svg>

                        <select name="" id="" class="bg-[#1C1D42] ">

                            <option value="">Sort by Date</option>
                            <option value="">Semua</option>
                            <option value="">Semua</option>
                            <option value="">Semua</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="BatasLuarbgt border-t-2 border-[#33356F] p-4 ">
                
                
                <div class="batas">
                @for($i=1;$i<=5;$i++)
                    <div class="batasLuar">
                        @for($j=1;$j<=5;$j++)
                        <div class="block no-border z-depth-2-top z-depth-2--hover">
                            <div class="block-image">
                                <a href="#">
                                    <img src="/foto/macc.png" class="img-center">
                                </a>
                            </div>
                            <div class="block-body text-center">
                                <h3 class="heading">
                                    <a href="#">
                                        MacBook Pro 5
                                    </a>
                                </h3>
                                <p class="product-description">
                                    2.8GHz Processor 1TB Storage 16GB DDR
                                </p>
                                <div class="product-buttons">
                                    <div class="buttomArea">
                                        <div class="buttonArea">
                                            <button type="button" class="btn btn-block btn-primary btn-circle btn-icon-left">
                                                <i class="fa fa-shopping-cart"></i>
                                                <p> Add to cart</p> 
                                            </button>
                                            <button class="butSeeProduct">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                @endfor
                </div>
                
                <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
                <script type="text/javascript">

                </script>
            </div>
        </div>
	</div>
</div>
<div class="popupProducts">
    
</div>



<meta charset="utf-8">


    <title>bs4 shop product list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- pop-up product style---- -->
    <style>

    </style>
    <!-- main style--------------- -->
    <style type="text/css">
        html{
            background-color: #131432;
        }
        .topSidebar{
            background-color: #131432;
            position: fixed;
            /* border: white solid; */
            width: 100%;
            z-index: 100;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding-right: 19%;
            padding-left: 20px;

        }
        .butCheckout{
            display: flex;
            flex-direction: row;
            background-color: orange;
            border-radius: 2px;
            align-items: center;
            justify-content: center;
        }
        .butCheckout>*{
            margin: 10px;
        }
        .butCheckout>p{
            margin-left:0 !important;
        }
        .butCheckout>svg{
            margin-right: 0 !important;
        }
        .tgl{
            padding-left: 20px;
        }
        .deContent{
            margin: 0 0 ;
            padding: 0 0;
        }
        .Notes{
            padding-top: 120px !important;
            padding-left: 20px;
            margin-bottom: 0;
        }
        .Notes>div>p{
            padding: 0;
            margin: 0;
        }
        .LiterallyContent{
            padding: 20px;
            /* padding-top: 10 px!important; */
        }
        .butCheckout{
            border-radius: 5px;
        }

        /* -------- product ----------- */
        .batas{
            width: 100%;
            padding: 10px;
            display: flex;
            flex-direction: column;
            /* border: 1px solid blue; */
        }
        .batasLuar{
            display: flex;
            flex-direction: row;
            /* justify-content: space-between; */
            /* border: 1px solid red; */
            width: 100%;
            height: auto;
            align-items: center;
            justify-content: center;

        }
        .batas>div>div{
            /* border: 1px solid black; */
            margin-right: 10px;
        }
        .block{
            /* border: 1px solid white; */
            background-color: #131432;
            width: 210px;
            height: 420px;
            padding: 10px;
            border-radius: 12px 0 12px 0;
        }
        .block-image{
            width: 100%;
            height: 60%;
        }
        .block-image{
            background-color: #131432;
            display: flex;
            justify-content: center;
        }
        .block-image>a{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .block-image>a>img{
            width: auto;
            height: 80%;
            transform: scale(1.5);
        }
        .block-body{
            height: 40%;

        }
        .block-body>h3>a{
            font-size: 20px;
            margin: 0 0;
            padding: 0 0;
        }
        .block-body>*{
            /* border: 1px solid black; */

        }
        @media (max-width: 991px) {
            .block-stack-wrapper .batas {
                margin-bottom: 20px
            }
        }

        .block .block-body {
            padding: 5px 5px;
        }


        .block .block-body>p {
            margin: 0 0;
            margin-bottom: 10px !important;
            font-size: 13px;
            padding: 0 0;
        }

        .z-depth-2-top, .z-depth-2-top--hover:hover {
            box-shadow: 0 3px 5px #33356F;
        }

        .batas>div>.block{
            margin-bottom: 20px;
        }
        .buttomArea{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            /* border: 1px white solid; */
        }
        .buttomArea>*{
            /* border: 1px solid black; */
            margin: 0 0 !important;
            /* border: 1px white solid; */

        }
        .btn{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            width: 70%;
        }
        .btn>*{
            /* border: 1px solid black; */
            padding: 0 0;
            margin: 0 0;
        }

        .BatasLuarbgt{
            height: auto;
        }

        html>*::-webkit-scrollbar{
            width: 8px;
            background-color: #131432;
        }
        html>*::-webkit-scrollbar-thumb{
            background-color: #33356F;
            border-radius: 10px;
            /* border: #131432  solid; */
        }
        /* --isi card-- */
        .heading>a{
            text-decoration: none;
        }
        .block-body>p{
            color: white;
        }
        .butSeeProduct{
            /* border: 1px white solid; */
            background-color: #002D4C;
            color: #718695;
            margin: 0 0;
            padding: 5px 5px;
            width: 18%;
            height: 100% !important;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }
        .butSeeProduct>*{
            /* padding: ; */
        }
        .buttonArea{
            width: 100%;
            height: 100% !important;
            display: flex;
            flex-direction: row;
            padding: 0 0;
            align-items: center;
            justify-content: space-between;
        }
    </style>
@endsection
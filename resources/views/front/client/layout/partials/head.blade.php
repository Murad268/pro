<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="{{asset('assets/css/index.css')}}" />

   <title data-lang="{{app()->getLocale()}}" class="title">{{app()->getLocale()}}</title>
   <style>
      * {
         padding: 0;
         margin: 0;

         box-sizing: border-box;
         text-align: left;
      }

      ul,
      ol {
         list-style: none;
         padding: 0;

      }

      ul li {
         padding: 5px 0;

      }

      main {
         padding: 40px 0;
      }

      .price_block ul {
         margin: 0 !important;
         height: 300px;
         overflow: scroll;
      }

      .img_block {
         display: block;
         margin: 0 auto;
         width: 80%;
         height: 550px;
         box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
      }

      img {
         width: 100% !important;
         height: 100%;
         object-fit: cover;
      }

      .price_block li {
         display: flex;
         align-items: center;
         column-gap: 15px
      }

      .home_page_btn {
         margin-left: 54px;
         margin-bottom: 10px;
      }
   </style>
</head>
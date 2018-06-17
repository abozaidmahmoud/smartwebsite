<!DOCTYPE html>
<html lang="en">

<head>
   @include('user/layouts/head')
   @section('headpart')
   @show()
</head>

<body>

    <!-- Navigation -->
   @include('user/layouts/header')


    <!--start Main Content -->
    @section('content')
    @show()


    <!--end  Main Content -->
    
    <!-- Footer -->
   @include('user/layouts/footer')
   @section('footpart')
   @show()
</body>

</html>

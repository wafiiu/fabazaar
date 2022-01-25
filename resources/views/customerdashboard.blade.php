<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

<style>

.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}
.mb-3{
    margin-bottom: 2rem!important;
}
.row{

width:100%;
height:35px;
margin-top:15px;
margin-left: 25px;


}
.col-sm-3{
  width:25%;
  float: left;
}
</style>

    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

        <h1 class="font-bold text-xl">Hello, {{ Auth::user()->name }}!</h1>
        You're logged in as customer!
        <br>
        <br>

    <div class="col-md-8">
                 <div class="card mb-3">
                   <div class="card-body">
                     <div class="row" style="width:100%">
                       <div class="col-sm-3">
                         <h6 class="mb-0">ID Number</h6>
                       </div>
                       <div class="col-sm-9 text-secondary" style="width: 70%">
                         {{ Auth::id() }}
                       </div>
                     </div>
                     <hr>
                     <div class="row"style="width:100%">
                       <div class="col-sm-3" >
                         <h6 class="mb-0">Full Name</h6>
                       </div>
                       <div class="col-sm-9 text-secondary"style="width: 70%">
                         {{ Auth::user()->name }}
                       </div>
                     </div>
                     <hr>
                     <div class="row"style="width:100%;height:35px">
                       <div class="col-sm-3">
                         <h6 class="mb-0">Email</h6>
                       </div>
                       <div class="col-sm-9 text-secondary"style="width: 70%">
                         {{ Auth::user()->email }}
                       </div>
                     </div>
                     <hr>
                     <div class="row"style="width:100%">
                       <div class="col-sm-3" >
                         <h6 class="mb-0">Phone</h6>
                       </div>
                       <div class="col-sm-9 text-secondary"style="width: 70%">
                         {{ Auth::user()->phone_no }}
                       </div>
                     </div>

                     <hr>
                     <div class="row"style="width:100%">
                       <div class="col-sm-3" >
                         <h6 class="mb-0">Address</h6>
                       </div>
                       <div class="col-sm-9 text-secondary"style="width: 70%">
                         {{ Auth::user()->address }}
                       </div>
                     </div>

                   </div>
                 </div>
               </div>
               </div>
               </div>
               </div>
</x-app-layout>

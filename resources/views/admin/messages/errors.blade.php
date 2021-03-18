@if ($errors->any())
<div class="card">
     <div class=" card-header card-header-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 </div>
 @endif

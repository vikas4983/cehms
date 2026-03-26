 <div class="d-flex flex-wrap align-items-center gap-16">
     <form id="inputForm" data-url="{{ $url }}" class="navbar-search dt-search m-0" action="POST">
         @csrf
         <input id="input" type="text" class="dt-input bg-transparent radius-4" aria-controls="dataTable"
             name="input" placeholder="Enter Id | Name | Email">
         <input id="route" type="hidden" value="{{ $currentRoute }}" class="dt-input bg-transparent radius-4"
             aria-controls="dataTable" name="route">

         <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
         <button class="btn btn-primary-600 filterBtn">Search</button>
     </form>

     <a href="{{ route($currentRoute) }}" class="btn btn-primary-600 filterBtn" title="Reload"><i
             class="ri-refresh-line"></i></a>
 </div>

<span class="successMessage  alert alert-success" style="width: 100%; display:none;">
</span>
<span class="errorMessage  alert alert-danger" style="width: 100%; display:none;">
</span>

<form id="inputForm" action="" data-url="{{ route('input.filter') }}" method="GET"
    style="display:flex; justify-content:center; align-items:center; gap:15px; flex-wrap:wrap;">

    <label style="font-weight:500; color:#333;">
        Registration Number
    </label>

    <input type="text" id="input" name="input" placeholder="Enter Registration No."
        style="padding:10px 15px; border:1px solid #ccc; border-radius:6px; width:220px; outline:none;">

    <button class="filterBtn"
        style="background:#1a73e8; color:#fff; border:none; padding:10px 20px; border-radius:6px; cursor:pointer;">
        Search
    </button>

</form>
<div class="result"></div>

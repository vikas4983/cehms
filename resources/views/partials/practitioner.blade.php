<span class="successMessage  alert alert-success" style="width: 100%; display:none;">
</span>
<span class="errorMessage  alert alert-danger" style="width: 100%; display:none;">
</span>

<form id="searchPractitionerForm" action="" data-url="{{ route('search.practitioner') }}" method="GET"
    style="display:flex; justify-content:center; align-items:center; gap:15px; flex-wrap:wrap;">

    <label style="font-weight:500; color:#333;">
        Registration Number
    </label>

    <input type="text" id="input" name="input" placeholder="Enter Registration No."
        style="padding:10px 15px; border:1px solid #ccc; border-radius:6px; width:220px; outline:none;">

    <button class="searchPractitionerBtn"
        style="background:#1a73e8; color:#fff; border:none; padding:10px 20px; border-radius:6px; cursor:pointer;">
        Search
    </button>

</form>

<div class="result">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtn = document.querySelector('.searchPractitionerBtn');
        if (filterBtn) {
            filterBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const input = document.querySelector('#input').value;
                if (!input) {
                    alert('Enter input value');
                    return;
                }
                const form = document.querySelector('#searchPractitionerForm');
                const action = form.dataset.url;
                const params = new URLSearchParams(new FormData(form));
                submitUrl(action, params);
            });
        }

        function submitUrl(action, params) {
            fetch(`${action}?${params}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        document.querySelector('.result').innerHTML = data.data;
                    } else {
                        document.querySelector('.result').innerHTML = '';
                        const errorMessage = document.querySelector('.errorMessage');
                        if (errorMessage) {
                            errorMessage.style.display = 'block';
                            errorMessage.innerText = data.message;

                            setTimeout(() => {
                                errorMessage.style.display = 'none';
                            }, 3000);
                        }
                    }
                })
                .catch(error => {
                    alert(error);
                });
        }
    });
</script>

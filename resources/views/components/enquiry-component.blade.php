<style>
    /* 🔥 Common */
    .enquire-now {
        position: fixed;
        top: 333px;
        left: -360px;
        width: 324px;
        /* background: #fff; */
        /* border-radius: 12px; */
        padding: 20px;
        z-index: 9999;
        /* box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2); */
        transition: all 0.4s ease;
    }

    /* 👇 Desktop active */
    .enquire-now.show {
        left: 10px;
    }

    /* ❌ Close button */
    .close-btn {
        position: absolute;
        top: 25px;
        right: 25px;
        border: none;
        background: none;
        font-size: 22px;
        cursor: pointer;

    }

    /* Inputs */
    .enquire-now input {
        width: 100%;
        margin-bottom: 10px;
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    /* Button */
    .enquire-btn {
        width: 100%;
        background: #4e73df;
        color: #fff;
        border: none;
        padding: 10px;
        /* border-radius: 6px; */
        cursor: pointer;
    }

    /* 🔥 MOBILE DESIGN */
    @media (max-width: 768px) {
        .enquire-now {
            top: 123px;
            left: 0;
            right: 0;
            margin: auto;
            width: 92%;
            max-width: 350px;

            transform: translateY(-20px);
            opacity: 0;
            pointer-events: none;
        }

        .enquire-now.show {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
    }
</style>


<!-- ✅ POPUP -->
<div class="enquire-now" id="enquiryBox">

    <button type="button" class="close-btn" id="closeBtn">×</button>

    <div class="inner">
        <h3>{{ __('ENQUIRY.HEADING') }}</h3>
        @include('alerts.alert')
        <form action="{{ route('enquiries.store') }}" data-url="" method="post">
            @csrf
            <div class="row1">
                <input name="name" id="name" placeholder="{{ __('ENQUIRY.NAME') }}" type="text" required>
            </div>
            <div class="row1 ">
                <input name="email" id="email" value="{{ old('email') }}" style="color: #fff"
                    class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('ENQUIRY.EMAIL') }}"
                    type="email" required>
                @error('email')
                    <div class="invalid-feedback" style="color: #ffffff">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row1 ">
                <input name="mobile" id="mobile" type="text" style="color: #fff"
                    class="form-control @error('mobile') is-invalid @enderror"
                    placeholder="{{ __('ENQUIRY.ENTER 10 DIGIT MOBILE') }}" value="{{ old('mobile') }}" maxlength="10"
                    inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)" required>
                @error('mobile')
                    <div class="invalid-feedback" style="color: #ffffff">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>
    <button type="submit" class="enquire-btn" id="submitBtn">
        {{ __('ENQUIRY.BUTTON') }} &nbsp;
        <i class="fa fa-play-circle"></i>
    </button>
    </form>
</div>
</div>


<!-- ✅ JS -->
<script>
    window.onload = function() {
        setTimeout(() => {
            document.getElementById('enquiryBox').classList.add('show');
        }, 500); // thoda delay for smooth feel
    };

    document.getElementById('closeBtn').addEventListener('click', function() {
        document.getElementById('enquiryBox').classList.remove('show');
    });
</script>

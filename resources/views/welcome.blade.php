<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

    <title>محاسبه گر  اقساط</title>
  </head>
  <body>
    @if (Auth::check())
    <form action="{{ route("logout") }}" method="POST">
        @csrf
        <button type="submit">خروج</button>
    </form>
    @endif
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="data-input-section">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="title">
                                <h1>محاسبه گر اقساط</h1>
                                <h4>مبلغ و تعداد اقساط رو مشخص کنید</h4>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <form action="javascript:void(0)" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="lendprice"> مقدار وام :</label>
                                        <input type="number" name="lendprice" id="lendprice" class="form-control" placeholder="مقدار وام به تومان">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lendmonth"> تعداد ماه :</label>
                                        <select name="lendmonth" class="form-select" id="lendmonth" aria-label="Default select example">
                                            <option selected value="">انتخاب کنید</option>
                                            <option value="1">یک ماه</option>
                                            <option value="2">دو ماه</option>
                                            <option value="3">سه ماه</option>
                                            <option value="4">چهار ماه</option>
                                            <option value="5">پنح ماه</option>
                                            <option value="6">شش ماه</option>
                                            <option value="7">هفت ماه</option>
                                            <option value="8">هشت ماه</option>
                                            <option value="9">نه ماه</option>
                                            <option value="10">ده ماه</option>
                                            <option value="11">یازده ماه</option>
                                            <option value="12">دوازده ماه</option>
                                          </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lendtype"> نوع ضمانت:</label>
                                        <select name="lendtype" class="form-select" id="lendtype" aria-label="Default select example">
                                            <option selected value="">انتخاب کنید</option>
                                            <option value="lendpaper">سفته</option>
                                            <option value="czech">چک</option>
                                          </select>
                                    </div>
                                    <div class="col-sm-12 col-md-2 d-grid gap-2">
                                        <input type="submit" style="margin-top: 24px;" id="lendsubmit" class="btn btn-md btn-rounded btn-success" value="محاسبه">
                                    </div>
                                    <div class="col-md-1">
                                        
                                    </div>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- @if ($data) --}}
        <div class="row" id="result">
            <div class="col-md-12">
                <div class="result-section">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/4.svg') }}" alt=""><br>
                                <a href="#">مبلغ هر قسط</a><br>
                                <a href="#" id="lendPerMonth"></a>
                            </div> 
                        </div>
                        @if (Auth::check())
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/2.svg') }}" alt=""><br>
                                <a href="#">میزان سود کل</a><br>
                                <a href="#" id="totalProfit"></a>
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/3.svg') }}" alt=""><br>
                                <a href="#">میزان سود ماهانه</a><br>
                                <a href="#" id="profitPerMonth"></a>
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/1.svg') }}" alt=""><br>
                                <a href="#">درصد سود کل</a><br>
                                <a href="#" id="totalProfitPercent"></a>
                                <a href="#">%</a>
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/5.svg') }}" alt=""><br>
                                <a href="#">درصد سود ماهانه</a><br>
                                <a href="#" id="profitPercentPerMonth"></a>
                                <a href="#">%</a>
                            </div> 
                        </div>
                        @endif
                        <div class="col-md-2">
                            <div class="count">
                                <img src="{{ asset('assets/img/6.svg') }}" alt=""><br>
                                <a href="#">مبلغ نهایی بازپرداخت</a><br>
                                <a href="#" id="totalResponde"></a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}

    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    // <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            $("#lendsubmit").click(function(){
                var lendprice = $("#lendprice").val();
                var lendmonth = $("#lendmonth").val();
                var lendtype = $("#lendtype").val();
                $.ajax({
                    url: "{{ route('calculate') }}",
                    type: "POST",
                    data: {
                        lendprice: lendprice,
                        lendmonth: lendmonth,
                        lendtype: lendtype,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function(data) {
                        alert(Object.values(data.responseJSON.errors)[0]);
                    },
                    success: function(data){
                        $("#result").slideToggle(710);
                        Object.entries(data).forEach(entry => {
                            const [key, value] = entry;
                            document.getElementById(key).innerHTML = value;
                        })
                    }
                });
            });
        });
    </script>
  </body>
</html>
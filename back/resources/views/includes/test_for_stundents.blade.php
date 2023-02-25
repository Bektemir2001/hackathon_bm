
<p class="header__authorization-header__signUp me-2 text-white" style="float: left;
display: block;" id="area_for_test_time">00:00:00</p>


<a class="header__authorization-header__signUp me-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">Начать тест</a>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
        <div class="modal-body">

            <p class="text-black" id="area_for_interier_test_time" style="position:fixed">00:00:00</p>

          <form class="auth-form text-center" action="{{route('test.result', auth()->user()->accessTest[0]->test->id)}}" method="POST">
            @csrf

            {{-- @dd(auth()->user()->accessTest[0]->test->question) --}}
            @foreach (auth()->user()->accessTest[0]->test->question as $test)
                <div class="auth-body">

                    <b class="mb-4">{{$test->question}}</b>
                    <div class="mb-3">
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="{{'answer['.$test->id.']'}}" id="{{'flexRadioDefault'.$test->id.'f'}}" value="1">
                            <div style="margin-right: 80%">
                                <b class="text-primary">{{'b)'}}</b>
                                <label class="form-check-label" for="{{'flexRadioDefault'.$test->id.'f'}}">
                                <h6>{{$test->first_answer}}</h6>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="{{'answer['.$test->id.']'}}" id="{{'flexRadioDefault'.$test->id.'s'}}" value="2">
                            <div style="margin-right: 80%;">
                                <b class="text-primary">{{'c)'}}</b>
                                <label class="form-check-label" for="{{'flexRadioDefault'.$test->id.'s'}}">
                                <h6>{{$test->second_answer}}</h6>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{'answer['.$test->id.']'}}" id="{{'flexRadioDefault'.$test->id.'t'}}" value="3">
                            <div style="margin-right: 80%">
                                <b class="text-primary">{{'a)'}}</b>
                                <label class="form-check-label" for="{{'flexRadioDefault'.$test->id.'t'}}">
                                <h6>{{$test->third_answer}}</h6>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
          <div class="autBtn mb-4 mt-4">
            <button class="btnSignIn" type="submit" id="finish_test_and_send" onclick="clickSend()">Отправить</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="d-none">
    {{$time = strtotime(Illuminate\Support\Carbon::now()) - strtotime(auth()->user()->accessTest[0]->created_at)}}
    @if(auth()->user()->accessTest[0]->time <= $time/60)
    {{auth()->user()->accessTest[0]->delete()}}
    <script>
        document.location.reload();
    </script>
    @else
    <div class="d-none" id="test_time_min">
        {{auth()->user()->accessTest[0]->time - round($time/60)}}
    </div>
    @endif
  </div>
  <script>

    if(localStorage.getItem('test_time_m') == null && localStorage.getItem('test_time_s') == null){
        var min = document.getElementById('test_time_min');
        var hour = 0;
        min = parseInt(min.innerHTML);
        if(min >= 60){
            hour = Math.floor(min/60);
            min = min % 60;
        }
        localStorage.setItem('test_time_h', hour);
        localStorage.setItem('test_time_m', min);
        localStorage.setItem('test_time_s', 59);
    }

    var area_for_test_time = document.getElementById('area_for_test_time');
    var area_for_interier_test_time = document.getElementById('area_for_interier_test_time');
    var test_time_h = localStorage.getItem('test_time_h');
    var test_time_m = localStorage.getItem('test_time_m');
    var test_time_s = localStorage.getItem('test_time_s');
    var finish_test_and_send = document.getElementById('finish_test_and_send');

    var area_for_test_timemob_mob = document.getElementById('area_for_test_time_mob');
    var area_for_interier_test_time_mob = document.getElementById('area_for_interier_test_time_mob');
    var finish_test_and_send_mob = document.getElementById('finish_test_and_send_mob');

    if(test_time_m && test_time_s){
        var timer = setInterval(timerFunction, 1000);
        function timerFunction(){
            if(test_time_h < 10){
                if(test_time_m < 10){
                    if(test_time_s < 10){
                        var time = "0"+test_time_h+":0"+test_time_m+":0"+test_time_s
                    }
                    else{
                        var time = "0"+test_time_h+":0"+test_time_m+":"+test_time_s
                    }
                }
                else{
                    if(test_time_s < 10){
                        var time = "0"+test_time_h+":"+test_time_m+":0"+test_time_s
                    }
                    else{
                        var time = "0"+test_time_h+":"+test_time_m+":"+test_time_s
                    }
                }
            }
            else{
                if(test_time_m < 10){
                    if(test_time_s < 10){
                        var time = test_time_h+":0"+test_time_m+":0"+test_time_s
                    }
                    else{
                        var time = test_time_h+":0"+test_time_m+":"+test_time_s
                    }
                }
                else{
                    if(test_time_s < 10){
                        var time = test_time_h+":"+test_time_m+":0"+test_time_s
                    }
                    else{
                        var time = test_time_h+":"+test_time_m+":"+test_time_s
                    }
                }
            }
            
            // console.log(time);
            area_for_test_time.innerHTML = time;
            area_for_interier_test_time.innerHTML = time;
            area_for_test_time_mob.innerHTML = time;
            area_for_interier_test_time_mob.innerHTML = time;

            if(test_time_s == 0){
                if(test_time_m == 0){
                    if(test_time_h == 0){
                        clearInterval(timer);
                        localStorage.removeItem('test_time_h');
                        localStorage.removeItem('test_time_m');
                        localStorage.removeItem('test_time_s');
                        finish_test_and_send.click();
                        finish_test_and_send_mob.click();
                    }
                    else{
                        localStorage.setItem('test_time_h', test_time_h-1);
                        localStorage.setItem('test_time_m', 59);
                        localStorage.setItem('test_time_s', 59);
                        test_time_h = localStorage.getItem('test_time_h');
                        test_time_m = localStorage.getItem('test_time_m');
                        test_time_s = localStorage.getItem('test_time_s');
                    }

                }
                else{
                    localStorage.setItem('test_time_m', test_time_m-1);
                    localStorage.setItem('test_time_s', 59);
                    test_time_m = localStorage.getItem('test_time_m');
                    test_time_s = localStorage.getItem('test_time_s');
                }
            }
            else{
                localStorage.setItem('test_time_s', test_time_s-1);
                test_time_s = localStorage.getItem('test_time_s');
            }

        }

    }

    function clickSend(){
        clearInterval(timer);
        localStorage.removeItem('test_time_h');
        localStorage.removeItem('test_time_m');
        localStorage.removeItem('test_time_s');
    }
    function clickSendMob(){
        clearInterval(timer);
        localStorage.removeItem('test_time_h');
        localStorage.removeItem('test_time_m');
        localStorage.removeItem('test_time_s');
    }
  </script>

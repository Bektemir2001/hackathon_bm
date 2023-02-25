<p class="header__authorization-header__signUp me-2 text-white" style="float: left;
display: block;" id="area_for_test_time_mob">00:00:00</p>


<a class="header__authorization-header__signUp me-2" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal4">Начать тест</a>
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
        <div class="modal-body">

            <p class="text-black" id="area_for_interier_test_time_mob" style="margin-left:60%">00:00:00</p>

            <form class="auth-form text-center" action="{{route('test.result', auth()->user()->accessTest[0]->test->id)}}" method="POST">
                @csrf

            {{-- @dd(auth()->user()->accessTest[0]->test->question) --}}
            @foreach (auth()->user()->accessTest[0]->test->question as $test)
                <div class="auth-body">

                    <b class="mb-4">{{$test->question}}</b>
                    <div class="mb-3">
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="{{'answer['.$test->id.']'}}" id="{{'flexRadioDefault'.$test->id.'f'}}" value="1">
                            <div style="margin-right: 70%">
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
                            <div style="margin-right: 70%;">
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
                            <div style="margin-right: 70%">
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
            <button class="btnSignIn" id="finish_test_and_send_mob" onclick="clickSendMob()">Отправить</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

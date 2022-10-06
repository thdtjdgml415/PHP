        <!-- 로그인 가입 팝업 -->
    <div class="login__popup">
        <div class="login__inner">
            <div class="login__header">
                <h3>로그인</h3>
            </div>
            <div class="login__contents">
                <form name="login" action="../login/loginSave.php" method="POST">
                    <fieldset>
                        <legend>로그인 입력폼</legend>
                            <div>
                                <label for="youEmail">이메일</label><!--이메일 글씨만 눌러도 활성화-->
                                <input type="email" name="youEmail" id="youEmail" placeholder="이메일" class="input__style" required>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label><!--비밀번호 글씨만 눌러도 활성화-->
                                <input type="password" name="youPass" id="youPass" placeholder="비밀번호" class="input__style" required>
                            </div>
                        <button type="submit" class="input__button">로그인</button>
                    </fieldset>
                    <!-- fieldset폼태그 영역설정 -->
                </form> 
            </div>
            <div class="login__footer">
                <div class="btn">
                    <a href="#">회원가입</a>
                    <a href="#">아이디 찾기</a>
                    <a href="#">비밀번호 찾기</a>
                </div>
                <ul class="desc">
                    <li>비밀번호 분실시 책임 못짐</li>
                    <li>회원가입하면 개인정보 털립니다..</li>
                    <li>개발자 초급이라 봐주세요</li>
                </ul>
                <button type="button" class="btn-close"><span>닫기</span></button>
            </div>
        </div>
    </div>
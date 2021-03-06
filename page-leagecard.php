<?php
/*
Template Name: リーグカードジェネレーター
Template Post Type: page
*/
?>
<?php get_header(); ?>

<!-- contents start -->
        <div class="container-non">
            <div class="row">
                <div class="card col s12 m6 l6">
                    <div class="card-content">
                        <span class="card-title">
							リーグカードジェネレーター
							<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </span>
						<div class="input-field col s12 l6">
							<input placeholder="作成日" id="input_date" type="date" class="validate">
							<label for="input_date">作成日</label>
						</div>
						<div class="input-field col s12 l6">
							<input placeholder="背番号" id="player_number" type="number" class="validate" value="000" max="999" min="000">
							<label for="player_number">背番号</label>
						</div>
						<div class="input-field col s12 l12">
							<input placeholder="トレーナー名" id="player_name" type="text" class="validate">
							<label for="player_name">トレーナー名</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="パスコード" id="input_passcode" type="text" class="validate">
							<label for="input_passcode">パスコード</label>
						</div>
						<div class="input-field col s4 l4">
							<input placeholder="文字色" id="input_fontcolor" type="color" class="validate" value="#ffffff">
							<label for="input_fontcolor">文字色</label>
						</div>
						<div class="input-field col s4 l4">
							<input placeholder="背景色(メイン)" id="input_color1" type="color" class="validate" value="#ff0000">
							<label for="input_color1">背景色(メイン)</label>
						</div>
						<div class="input-field col s4 l4">
							<input placeholder="背景色(サブ)" id="input_color2" type="color" class="validate" value="#910000">
							<label for="input_color2">背景色(サブ)</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding1" id="holding1">
								<option value="000">手持ち1</option>
							</select>
							<label>手持ち1</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding2" id="holding2">
								<option value="000">手持ち2</option>
							</select>
							<label>手持ち2</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding3" id="holding3">
								<option value="000">手持ち3</option>
							</select>
							<label>手持ち3</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding4" id="holding4">
								<option value="000">手持ち4</option>
							</select>
							<label>手持ち4</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding5" id="holding5">
								<option value="000">手持ち5</option>
							</select>
							<label>手持ち5</label>
						</div>
						<div class="input-field col s6 l6">
							<select name="holding6" id="holding6">
								<option value="000">手持ち6</option>
							</select>
							<label>手持ち6</label>
						</div>
						<div class="input-field col s12">
							<textarea class="materialize-textarea" id="input_contents" rows="10"></textarea>
							<label for="input_contents">自己紹介</label>
						</div>
						<a id="make_card" class="waves-effect waves-light btn modal-trigger" onclick="change_cv_sm()" href="#modalcard">カード作成!!!</a>
                    </div>
                </div>
				<div class="card-panel col s6 m6 hide-on-small-only">
					<canvas id="cv_pc" class="responsive-img" width="768" height="960"></canvas>
					<img id="cv_img" class="responsive-img"></img>
				</div>
            </div>
        </div>
		<div id="modalcard" class="modal">
			<div class="modal-content">
				<p>画像を保存して使ってください</p>
				<img id="cv_sm_img" class="responsive-img" />
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green">CLOSE</div>
			</div>
		</div>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Materialize JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script src="<?php echo get_template_directory_uri()?>/leagecard-generater/galar.json"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var elements=document.querySelectorAll('.sidenav');
                var instances=M.Sidenav.init(elements, {});
            });
            const make_card_btn=document.getElementById("make_card");
            make_card_btn.addEventListener('click', function(){
                change_cv_sm();
            });
            $(function(){
                // 日付の初期入力
                var date = new Date();
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                var date_text = year + "-" + month + "-" + day
                $('#input_date').val(date_text);

                pokemon_load();
                // $('select').selModal();
                $('select').formSelect();
                $('.modal').modal();
                $('.materialboxed').materialbox();

                all_draw();
                $('#input_date').on('input',function(event){
                    all_draw();
                });
                $('#player_number').on('input',function(event){
                    all_draw();
                });
                $('#player_name').on('input',function(event){
                    all_draw();
                });
                $('#input_fontcolor').on('input',function(event){
                    all_draw();
                });
                $('#input_color1').on('input',function(event){
                    all_draw();
                });
                $('#input_color2').on('input',function(event){
                    all_draw();
                });
                $('#input_contents').on('input',function(event){
                    all_draw();
                });
                // $('#switch_passcode').change(function(){
                //     $('.class_passcode').toggle();
                //     all_draw();
                // });
                $('#input_passcode').on('input',function(event){
                    all_draw();
                });
                $('#holding1').change(function(){
                    all_draw();
                });
                $('#holding2').change(function(){
                    all_draw();
                });
                $('#holding3').change(function(){
                    all_draw();
                });
                $('#holding4').change(function(){
                    all_draw();
                });
                $('#holding5').change(function(){
                    all_draw();
                });
                $('#holding6').change(function(){
                    all_draw();
                });
            });
            function all_draw(){
                bg_draw();
                date_draw();
                playernumber_draw();
                playername_draw();
                contents_draw();
                signature_draw();
                // チェックされてれば表示する
                // if($('#switch_passcode:checked').val() == "on"){
                    // console.log('on');
                    passcode_draw();
                // }
                holding_draw();
            }
            function holding_draw(){
                var element;
                var img_src = [];
                for(var i=1;i<=6;i++){
                    element = '#holding' + i;
                    console.log(element)
                    if($(element).val()!=='000'){
                        var url = 'img_galar/'+$(element).val()+'.png'
                        console.log(url);
                        img_src.push(url);
                    }
                }
                // console.log(img_src.length);
                if(img_src.length>0){
                    var images = [];
                    for(var i in img_src){
                        images[i] = new Image();
                        images[i].src = img_src[i];
                        // console.log(img_src[i]);
                    }
                    var canvas = $('#cv_pc');
                    var ctx = canvas[0].getContext('2d');
                    var loadedCount = 1;
                    for(var i in images){
                        images[i].addEventListener('load', function(){
                            if(loadedCount == images.length){
                                var x = 0;
                                var y = 0;
                                for(var j in images){
                                    var magni = 1.5;
                                    ctx.scale(magni,magni);
                                    ctx.drawImage(images[j],x,y);
                                    ctx.scale(1/magni,1/magni);
                                    y +=50;
                                }
                            }
                            loadedCount++;
                        }, false);
                    }
                }
            }
            function bg_draw(){
                // console.log('bg_draw');
                var canvas = $('#cv_pc');
                var ctx = canvas[0].getContext('2d');
                var w = canvas[0].width;
                var h = canvas[0].height;

                var color1 = $('#input_color1').val();
                var color2 = $('#input_color2').val();
                // console.log(color1);
                // console.log(color2);

                var rot;

                ctx.beginPath();
                ctx.clearRect(0,0,w,h);
                // ctx.fillStyle = 'rgba(255,255,255)';
                ctx.fillStyle = color2;
                ctx.fillRect(0,0,w,h);
                ctx.rotate(0);
                ctx.stroke();


                // 斜線
                rot=20;
                ctx.beginPath();
                ctx.fillStyle = color1;
                ctx.rotate(rot* Math.PI / 180);
                ctx.fillRect(210,-300,690,h*2);
                ctx.stroke();
                ctx.rotate(-rot* Math.PI / 180);

                // 左側の黒線
                ctx.beginPath();
                ctx.fillStyle = 'rgba(77,77,77)';
                ctx.fillRect(0,0,100,h);
                ctx.stroke();
            }
            function playernumber_draw(){
                // console.log('playernumber_draw');
                var w = $('#cv_pc')[0].width;
                var h = $('#cv_pc')[0].height;
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = $('#player_number').val();

                ctx.beginPath();
                ctx.font = '120pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();
                ctx.fillText(value,10,h-50);
                ctx.stroke();
            }
            function playername_draw(){
                // console.log('playername_draw');
                var w = $('#cv_pc')[0].width;
                var h = $('#cv_pc')[0].height;
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = $('#player_name').val();

                ctx.beginPath();
                ctx.font = '50pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();
                ctx.fillText(value,400,h-50);
                ctx.stroke();
            }
            function contents_draw(){
                // console.log('contents_draw');
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = $('#input_contents').val();
                var textList = value.split('\n');
                var x = 150;
                var y = 200;

                ctx.beginPath();
                ctx.font = '20pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();

                var lineHeight = ctx.measureText("あ").width+15;

                textList.forEach(function(text, i){
                        ctx.fillText(text, x, y+lineHeight*i);
                });
                ctx.stroke();
            }
            function date_draw(){
                // console.log('date_draw');
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = $('#input_date').val();
                ctx.beginPath();
                ctx.font = '20pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();
                ctx.fillText(value, 120, 100);
                ctx.stroke();
            }
            function signature_draw(){
                // console.log('signature_draw');
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = "Created by http://pokedex-online.jp/webapp/leaguecard_generator";
                var w = $('#cv_pc')[0].width;
                var h = $('#cv_pc')[0].height;
                ctx.beginPath();
                ctx.font = '10pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();
                ctx.fillText(value, 20, h-10);
                ctx.stroke();
            }
            function passcode_draw(){
                // console.log('passcode_draw');
                var ctx = $('#cv_pc')[0].getContext('2d');
                var value = $('#input_passcode').val();
                var w = $('#cv_pc')[0].width;
                var h = $('#cv_pc')[0].height;

                if(value!==""){
                    var result="";
                    // console.log(value.length%4>>0);
                    for(var i=0;i<value.length;i++){
                        if((i%4>>0)===0 & i>1){
                            result+="-"+value.substr(i,1);
                        }else{
                            result+=value.substr(i,1);
                        }
                    }
                    value=result;
                    console.log(result);
                }
                ctx.beginPath();
                ctx.font = '20pt Arial';
                ctx.fillStyle = $('#input_fontcolor').val();
                ctx.fillText(value, 400, h-120);
                ctx.stroke();
            }
            function change_cv(){
                // console.log('change_cv');
                var canvas = $('#cv_pc')[0].toDataURL();
                console.log(canvas);
                $('#cv_img')[0].src = canvas;
            }
            function change_cv_sm(){
                // console.log('change_cv_sm');
                var canvas = $('#cv_pc')[0].toDataURL();
                console.log(canvas);
                $('#cv_sm_img')[0].src = canvas;
            }
            function pokemon_load(){
                var element;
                // for(pokemon in galar[0]){
                    // console.log(galar[0][pokemon])
                // }
                console.log(galar[0]["001"])
                for(var i=1;i<=6;i++){
                    element = '#holding'+i;
                    for(var j=1;j<=400;j++){
                        // $(element).append('<option data-image="{{ asset("img_galar") }}/'+('000'+j).slice(-3)+'.png" value="'+('000'+j).slice(-3)+'">'+galar[0][('000'+j).slice(-3)]+'</option>');
                        $(element).append('<option value="'+('000'+j).slice(-3)+'">'+galar[0][('000'+j).slice(-3)]+'</option>');
                    }
                }
            }
        </script>
<!-- contents end -->

<?php get_footer(); ?>

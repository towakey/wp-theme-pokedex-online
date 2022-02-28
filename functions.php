<?php

function create_init_pages(){
    $pages_array=array('title'=>'index', 'name'=>'index', 'contents'=>'', 'parent'=>'', 'template'=>'page-index.php');
    setting_pages($pages_array);
}

function create_init_pokedex_top_pages(){
    $url="/pokedex";
    $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/pokedex.json');
    $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $pokedex_json=json_decode($pokedex_file, true);
    // $description_file=file_get_contents(get_template_directory().$url.'/pokedex/description.json');
    // $description_file=mb_convert_encoding($description_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    // $description_json=json_decode($description_file, true);


    // $description_version_name=[
    //     ""
    // ]


    $cnt=4;
    for($i=0;$i<count($pokedex_json['pokedex']);$i++){
        $pokedex_id=$pokedex_json['pokedex'][$i]['id'];
        $pokedex_name=$pokedex_json['pokedex'][$i]['name']['jpn'];
        $link_uri=home_url( '/' )."pokedex/";
        // $pokedex_class=$pokedex_json['pokedex'][$i]['classification'];
        // $pokedex_height=$pokedex_json['pokedex'][$i]['height'];
        // $pokedex_weight=$pokedex_json['pokedex'][$i]['weight'];

        // if($i==0){
        //     $pokedex_name_prev=null;
        // }else{
        //     $pokedex_name_prev=$pokedex_json['pokedex'][$i-1]['name']['jpn'];
        // }
        // if($i>count($pokedex_json['pokedex'])){
        //     $pokedex_name_next=null;
        // }else{
        //     $pokedex_name_next=$pokedex_json['pokedex'][$i+1]['name']['jpn'];
        // }

if($i==0){
$contents=$contents.<<<EOF
<div class="row">

EOF;
}elseif(($i % $cnt)==0){
$contents=$contents.<<<EOF
<div class="row">

EOF;
}

$contents=$contents.<<<EOF
<a href="$link_uri$pokedex_name" class="col s6 m3 l3">
    <div class="card z-depth-0 grey lighten-3">
        <div class="card-content">
            <span class="card-title center-align">No$pokedex_id $pokedex_name</span>
        </div>
    </div>
</a>
EOF;
        // $pages_array=array('title'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'name'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'contents'=>$contents, 'parent'=>'pokedex', 'template'=>'page-pokedex.php');
        // setting_pages($pages_array);
if((($i+1) % $cnt)==0){
$contents=$contents.<<<EOF
</div>

EOF;
}            
    }
// $contents=$contents.<<<EOF
// </div>
// EOF;
// if($i==3){
// $contents=$contents.<<<EOF
// </div>
// EOF;
// }else
    
    $pages_array=array('title'=>'pokedex', 'name'=>'pokedex', 'contents'=>$contents, 'parent'=>'', 'template'=>'page-pokedex-top.php');
    setting_pages($pages_array);

}

function create_pokedex_pages(){
    // $pages_array[]=array('title'=>'test', 'name'=>'name_test', 'parent'=>'');
    // foreach($pages_array as $value){
    //     setting_pages($value);
    // }
    $url="/pokedex";
    $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/pokedex.json');
    $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $pokedex_json=json_decode($pokedex_file, true);
    $description_file=file_get_contents(get_template_directory().$url.'/pokedex/description.json');
    $description_file=mb_convert_encoding($description_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $description_json=json_decode($description_file, true);

    $version_conversion=array(
        'red'=>'赤','green'=>'緑','blue'=>'青','pikachu'=>'ピカチュウ',
        'gold'=>'金','silver'=>'銀','crystal'=>'クリスタル',
        'ruby'=>'ルビー','sapphire'=>'サファイア','firered'=>'ファイアレッド','leafgreen'=>'リーフグリーン','emerald'=>'エメラルド',
        'diamond'=>'ダイアモンド','pearl'=>'パール','platinum'=>'プラチナ',
        'black'=>'ブラック','white'=>'ホワイト','black2'=>'ブラック2','white2'=>'ホワイト2','heartgold'=>'ハートゴールド','soulsilver'=>'ソウルシルバー',
        'x'=>'X','x_kanji'=>'X(漢字)','y'=>'Y','y_kanji'=>'Y(漢字)','omegaruby'=>'オメガルビー','omegaruby_kanji'=>'オメガルビー(漢字)','alphasapphire'=>'アルファサファイア','alphasapphire_kanji'=>'アルファサファイア(漢字)',
        'sun'=>'サン','sun_kanji'=>'サン(漢字)','moon'=>'ムーン','moon_kanji'=>'ムーン(漢字)','ultrasun'=>'ウルトラサン','ultrasun_kanji'=>'ウルトラサン(漢字)','ultramoon'=>'ウルトラムーン','ultramoon_kanji'=>'ウルトラムーン(漢字)',
        'letsgopikachu'=>"Let's go ピカチュウ",'letsgopikachu_kanji'=>"Let's go ピカチュウ(漢字)",'letsgoeevee'=>"Let's go イーブイ",'letsgoeevee_kanji'=>"Let's go イーブイ(漢字)",'sword'=>'ソード','sword_kanji'=>'ソード(漢字)','shield'=>'シールド','shield_kanji'=>'シールド(漢字)',
        'pokemongo'=>'PokemonGO','pokemonstadium'=>'ポケモンスタジアム','pokemonpinball'=>'ポケモンピンボール','pokemonranger'=>'ポケモンレンジャー	'
    );

    // $description_version_name=[
    //     ""
    // ]

    for($i=0;$i<count($pokedex_json['pokedex']);$i++){
        $pokedex_id=$pokedex_json['pokedex'][$i]['id'];
        $pokedex_name=$pokedex_json['pokedex'][$i]['name']['jpn'];
        $pokedex_class=$pokedex_json['pokedex'][$i]['classification'];
        $pokedex_height=$pokedex_json['pokedex'][$i]['height'];
        $pokedex_weight=$pokedex_json['pokedex'][$i]['weight'];

        if($i==0){
            $pokedex_name_prev=null;
        }else{
            $pokedex_name_prev=$pokedex_json['pokedex'][$i-1]['name']['jpn'];
        }
        if($i>count($pokedex_json['pokedex'])){
            $pokedex_name_next=null;
        }else{
            $pokedex_name_next=$pokedex_json['pokedex'][$i+1]['name']['jpn'];
        }
        $link_uri=home_url( '/' )."pokedex/";


$contents=<<<EOF
<div class="row">
<div class="col s12 m12 l12">
    <div class="card z-depth-0">
EOF;
if($pokedex_name_prev===null){
$contents=$contents.<<<EOF
<a href="$link_uri$pokedex_name_next" class="waves-effect waves-light btn right grey lighten-1 z-depth-0">$pokedex_name_next</a>
EOF;
}elseif($pokedex_name_next===null){
$contents=$contents.<<<EOF
<a href="$link_uri$pokedex_name_prev" class="waves-effect waves-light btn left grey lighten-1 z-depth-0">$pokedex_name_prev</a>
EOF;
}else{
$contents=$contents.<<<EOF
<a href="$link_uri$pokedex_name_prev" class="waves-effect waves-light btn left grey lighten-1 z-depth-0">$pokedex_name_prev</a><a href="$link_uri$pokedex_name_next" class="waves-effect waves-light btn right grey lighten-1 z-depth-0">$pokedex_name_next</a>
EOF;
}
$contents=$contents.<<<EOF
    </div>
</div>
</div>

<div class="row">
<div class="col s12 m6 l6">
    <div class="card z-depth-0 grey lighten-3">
        <div class="card-content">
            <span class="card-title center-align">$pokedex_name</span>
            <span class="">No Image</span>
        </div>
    </div>
</div>
<div class=" col s12 m6 l6">
    <div class="card z-depth-0 grey lighten-3">
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>全国図鑑No</th>
                        <td>$pokedex_id</td>
                    </tr>
                    <tr>
                        <th>分類</th>
                        <td>$pokedex_class</td>
                    </tr>
                    <tr>
                        <th>高さ</th>
                        <td>$pokedex_height m</td>
                    </tr>
                    <tr>
                        <th>重さ</th>
                        <td>$pokedex_weight kg</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col s12 m12 l12">
    <ul class="collapsible grey lighten-3">
    <li>
    <div class="collapsible-header z-depth-0 grey lighten-1">図鑑説明</div>
    <div class="collapsible-body">
    <table class=" grey lighten-3">
        <thead>
            <tr>
                <th style="width: 20%;">バージョン</th>
                <th style="width: 80%;">図鑑説明</th>
            </tr>
        </thead>
        <tbody>
EOF;
// for($j=0;$j<57;$j++)
// {
    foreach($description_json["description"][$i]["ja"] as $key=>$value)
    {

    // $description_contents=;
    $version=$version_conversion[$key];
$contents=$contents.<<<EOF
<tr>
    <th>$version</th>
    <td>$value</td>
</tr>
EOF;
    }
// }
$contents=$contents.<<<EOF
        </tbody>
    </table>
    </li>
    </ul>
</div>
</div>

EOF;
        $pages_array=array('title'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'name'=>$pokedex_json['pokedex'][$i]['name']['jpn'], 'contents'=>$contents, 'parent'=>'pokedex', 'template'=>'page-pokedex.php');
        setting_pages($pages_array);
    }
}

function setting_pages($val){
    // $template="page-pokedex.php";
    if(!empty($val['parent'])){
        $parent_id=get_page_by_path($val['parent']);
        $parent_id=$parent_id->ID;
        $page_slug=$val['parent']."/".$val['name'];
    }else{
        $parent_id="";
        $page_slug=$val['name'];
    }

    if(empty(get_page_by_path($page_slug))){
        $page_name=$val['name'];
        // remove_filter('content_save_pre', 'wp_filter_post_kses');
        remove_filter('the_content', 'wpautop');
        $insert_id=wp_insert_post(
            array(
                'post_title'    =>$val['title'],
                'post_name'     =>$page_name,
                'post_status'   =>'publish',
                'post_type'     =>'page',
                'post_parent'   =>$parent_id,
                'post_content'  =>$val['contents'],
                'page_template' =>$val['template'],
            )
        );
    }else{
        $page_obj=get_page_by_path($page_slug);
        $page_id=$page_obj->ID;
        $page_name=$val['name'];
        $base_post=array(
            'ID'        =>$page_id,
            'post_title'=>$val['title'],
            'post_name' =>$page_name,
            'post_content'  =>$val['contents'],
            'page_template' =>$val['template'],
        );
        remove_filter('the_content', 'wpautop');
        wp_update_post($base_post);
    }
}

if(isset($_POST['run'])){
    create_pokedex_pages();
}
if(isset($_POST['init_run'])){
    create_init_pages();
}
if(isset($_POST['init_pokedex_top_run'])){
    create_init_pokedex_top_pages();
}





// add_action('admin_menu', 'create_pokedex_pages');
// https://jajaaan.co.jp/wordpress/wordpress-admin-page/
add_action('admin_menu', 'custom_menu_page');
function custom_menu_page()
{
  add_menu_page('データセット', 'データセット', 'manage_options', 'custom_menu_page', 'add_custom_menu_page', 'dashicons-admin-generic', 4);
}
function add_custom_menu_page()
{
    $pokedex=array('status'=>false, 'version'=>'', 'update'=>'');
    $description=array('status'=>false, 'version'=>'', 'update'=>'');
    $type=array('status'=>false, 'version'=>'', 'update'=>'');

    if(!file_exists(get_template_directory().'/pokedex'))
    {
?>
<div class="wrap">
    <h2>データセット状態</h2>
    <div class="metabox-holder">
        <div class="postbox ">
            <h3 class='hndle'><span>Pokedex</span></h3>
            <div class="inside">
                <div class="main">
                    <h4>Pokedexフォルダがありません</h4>
                    <p class="setting_description">Githubから最新のPokedexをダウンロードしてテーマフォルダ直下に入れてください。</p>
                    <a href="https://github.com/towakey/pokedex">https://github.com/towakey/pokedex</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    else
    {
        $url="/pokedex";
        if(file_exists(get_template_directory().$url.'/pokedex/pokedex.json'))
        {
            $pokedex['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/pokedex.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $pokedex['version']=$pokedex_json['version'];
            $pokedex['update']=$pokedex_json['update'];
        }
        if(file_exists(get_template_directory().$url.'/pokedex/description.json'))
        {
            $description['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/pokedex/description.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $description['version']=$pokedex_json['version'];
            $description['update']=$pokedex_json['update'];
        }
        if(file_exists(get_template_directory().$url.'/type/type.json'))
        {
            $type['status']=true;
            $pokedex_file=file_get_contents(get_template_directory().$url.'/type/type.json');
            $pokedex_file=mb_convert_encoding($pokedex_file, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $pokedex_json=json_decode($pokedex_file, true);
            // var_dump($pokedex_json);
            $type['version']=$pokedex_json['version'];
            $type['update']=$pokedex_json['update'];
        }
    // var_dump(get_template_directory()."/pokedex/pokedex.json");
    // var_dump(file_exists(get_template_directory()."/pokedex/pokedex.json"));
?>
<div class="wrap">
    <h2>データセット状態</h2>
    <div class="metabox-holder">
        <div class="postbox ">
            <form action="" method="post">
                <button type="submit" name="run">実行</button>
                <button type="submit" name="init_run">初期実行</button>
                <button type="submit" name="init_pokedex_top_run">ポケモン図鑑トップ初期実行</button>
            </form>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>Pokedex.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">ポケモン図鑑のメインデータセット</p>
                    <?php
                    if($pokedex['status']){
                        echo "<h4>version:".$pokedex['version']."</h4>";
                        echo "<h4>update:".$pokedex['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>description.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">ポケモン図鑑の説明文データセット</p>
                    <?php
                    if($description['status']){
                        echo "<h4>version:".$description['version']."</h4>";
                        echo "<h4>update:".$description['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
        <div class="postbox ">
            <h3 class='hndle'><span>type.json</span></h3>
            <hr>
            <div class="inside">
                <div class="main">
                    <p class="setting_description">タイプ相性データセット</p>
                    <?php
                    if($description['status']){
                        echo "<h4>version:".$type['version']."</h4>";
                        echo "<h4>update:".$type['update']."</h4>";
                    }else{
                        echo "ファイルがありません";
                    }
                    ?>
                    <!-- <h4>テキスト</h4> -->
                    <!-- <p><input type="text" id="text" name="text" value="<?php echo get_option('text'); ?>"></p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}

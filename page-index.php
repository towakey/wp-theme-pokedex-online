<?php
/*
Template Name: index
Template Post Type: page
*/
?>
<?php get_header(); ?>

<!-- contents start -->
<div class="row">
    <a href="<?php echo home_url( '/' )."pokedex/"; ?>" class="col s12 m12 l6">
        <div class="card">
            <div class="card-content">
                <div class="card-title">ポケモン図鑑</div>
                <p>ポケモンの基礎情報を載せています。</p>
            </div>
        </div>
    </a>
    <div class="card col s12 m12 l6">
        <div class="card-content">
            <div class="card-title">WebApp</div>
            <table>
                <tr>
                    <td>
                        <a href="<?php echo home_url( '/' )."leaguecard_generator/"; ?>">リーグカードジェネレーター</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <a href="#" class="col s12 m12 l6">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Blog</div>
                <p>ポケモンやプログラミング関係の記事を載せています。</p>
            </div>
        </div>
    </a>
</div>
<!-- contents end -->

<?php get_footer(); ?>

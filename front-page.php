<?php get_header(); ?>

<main>
  <section id="terms" class="p-terms">
    <div class="p-terms__inner">
      <div class="p-terms__title-wrap">
        <h2 class="p-terms__main-title js-text-slideIn">最高のゲーム体験を<br>手に入れよう！</h2>
        <p class="p-terms__sub-title js-text-slideIn">安心・安全な取引で、理想のゲームアカウントですぐに始められます</p>
      </div>
      <div class="p-terms__contents">
        <h3 class="p-terms__content-title">▼利用前に必ずご確認をお願いします▼</h3>
        <ul class="p-terms__content-list">
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>石数が多少前後する場合がありますので、ご理解をお願いします。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>在庫の変動がある場合がありますので、購入の際は在庫の確認をお願いします。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>記載されてないアプリも多数取り扱っております。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>お支払いPay Payの場合、マネーライト送金になる方は+500円頂戴しております。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text">※上記を確認せず、+500円(マネーライトの場合)を送金されなかった場合の返金対応は出来かねますのでご注意ください。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>購入後はなるべくパスワード等の変更をお願い致します。</p>
          </li>
          <li class="p-terms__content-item">
            <p class="p-terms__content-text"><span>・</span>返品、返金、交換は当方の不手際以外、対応不可になります。</p>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section id="buy" class="p-buy">
    <div class="p-buy__inner">
      <div class="p-buy__outline c-outline">
        <div class="p-buy__outline-square-box p-outline-square-box p-outline-square-box--tl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-buy__outline-square-box p-outline-square-box p-outline-square-box--tr">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-buy__outline-square-box p-outline-square-box p-outline-square-box--br">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-buy__outline-square-box p-outline-square-box p-outline-square-box--bl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-buy__contents c-sub-outline">
          <h2 class="p-buy__title js-fadeIn">-購入方法-</h2>
          <ol class="p-buy__step-list">
            <li class="p-buy__step-item js-fadeIn">
              <div class="p-buy__step-content">
                <h3 class="p-buy__step-title">欲しいアカウントを探す</h3>
                <p class="p-buy__step-text">購入したいゲームタイトルを選択し、表示されたメニュー欄から欲しいアカウントを探します。</p>
              </div>
              <span class="p-buy__step-arrow"></span>
            </li>
            <li class="p-buy__step-item js-fadeIn">
              <div class="p-buy__step-content">
                <h3 class="p-buy__step-title">DMにて問い合わせ、購入手続き</h3>
                <p class="p-buy__step-text">気に入ったアカウントが見つかったら、番号やスクショをDMに送信する</p>
              </div>
              <span class="p-buy__step-arrow"></span>
            </li>
            <li class="p-buy__step-item js-fadeIn">
              <div class="p-buy__step-content">
                <h3 class="p-buy__step-title">お支払い</h3>
                <p class="p-buy__step-text">お支払い方法を選択し、決済に移ります。</p>
              </div>
              <span class="p-buy__step-arrow"></span>
            </li>
            <li class="p-buy__step-item js-fadeIn">
              <div class="p-buy__step-content">
                <h3 class="p-buy__step-title">アカウント情報を受け取る</h3>
                <p class="p-buy__step-text">お支払い確認後、主からアカウント情報が送付されます。</p>
              </div>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section id="game" class="p-game">
    <div class="p-game__inner">
      <div class="p-game__content">
        <div class="p-game__title-wrap">
          <h2 class="p-game__main-title">ゲーム一覧</h2>
          <p class="p-game__sub-title">アイコンを押すと詳細を確認できます</p>
        </div>
        <?php
        $game_query = new WP_Query(
          array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          )
        );
        ?>
        <?php if ($game_query->have_posts()) : ?>
          <ul class="p-game__list p-game-list">
            <?php
            while ($game_query->have_posts()) :
              $game_query->the_post();
              $post_id    = get_the_ID();
              $game_count = function_exists('get_field') ? get_field('game_count', $post_id) : get_post_meta($post_id, 'game_count', true);
              $modal_id   = 'game-modal-' . $post_id;
            ?>
              <li class="p-game-list__wrap">
                <div class="p-game-list__item js-modal-open js-fadeIn" data-target="<?php echo esc_attr($modal_id); ?>">
                  <figure class="p-game-list__thumb">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('full'); ?>
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/dummy.jpg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                  </figure>
                  <div class="p-game-list__overview">
                    <h3 class="p-game-list__title"><?php the_title(); ?></h3>
                    <?php if ($game_count) : ?>
                      <p class="p-game-list__meta"><?php echo esc_html($game_count); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="p-game-list__modal p-modal js-modal" id="<?php echo esc_attr($modal_id); ?>">
                  <button class="p-modal__close-button js-modal-close"><span></span>close</button>
                  <div class="p-modal__inner">
                    <figure class="p-modal__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/dummy.jpg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                      <?php endif; ?>
                    </figure>
                    <div class="p-modal__text">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        <?php else : ?>
          <p class="p-game__empty">現在、表示できるゲームがありません。</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="p-pay">
    <div class="p-pay__inner">
      <div class="p-pay__outline c-outline">
        <div class="p-pay__outline-square-box p-outline-square-box p-outline-square-box--tl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-pay__outline-square-box p-outline-square-box p-outline-square-box--tr">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-pay__outline-square-box p-outline-square-box p-outline-square-box--br">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-pay__outline-square-box p-outline-square-box p-outline-square-box--bl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-pay__contents c-sub-outline">
          <h2 class="p-pay__title">-お支払方法-</h2>
          <ul class="p-pay__content-list">
            <li class="p-pay__content-item">
              <p class="p-pay__content-text"><span>・</span>PayPay送金 ※マネーライト残高送金の場合+500円</p>
            </li>
            <li class="p-pay__content-item">
              <p class="p-pay__content-text"><span>・</span>セブンイレブン決済</p>
            </li>
            <li class="p-pay__content-item">
              <p class="p-pay__content-text"><span>・</span>ローソン決済</p>
            </li>
            <li class="p-pay__content-item">
              <p class="p-pay__content-text"><span>・</span>Amazonギフト券 ※商品代金+1000円割高</p>
            </li>
          </ul>
          <p class="p-pay__support">セブンイレブン、ローソンでのお支払いは初めての方は苦戦すると思うので分かりやすく丁寧にサポートします！</p>
        </div>
      </div>
    </div>
  </section>

  <section class="p-qa">
    <div class="p-qa__inner">
      <div class="p-qa__outline c-outline">
        <div class="p-qa__outline-square-box p-outline-square-box p-outline-square-box--tl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-qa__outline-square-box p-outline-square-box p-outline-square-box--tr">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-qa__outline-square-box p-outline-square-box p-outline-square-box--br">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-qa__outline-square-box p-outline-square-box p-outline-square-box--bl">
          <div class="p-outline-main-square"></div>
          <div class="p-outline-sub-square"></div>
        </div>
        <div class="p-qa__contents c-sub-outline">
          <h2 class="p-qa__title">-よくある質問-</h2>
          <ul class="p-qa__content-list">
            <li class="p-qa__content-item">
              <p class="p-qa__question">Q.石垢って何ですか？</p>
              <p class="p-qa__answer">A.石垢とは、ログインボーナスやクエストクリアでのみガチャを引ける石などを貯めたアカウントを意味します。不正行為一切無しの安心安全にご利用頂ける商品です！</p>
            </li>
            <li class="p-qa__content-item">
              <p class="p-qa__question">Q.記載ないタイトルの取り扱いはありますか？</p>
              <p class="p-qa__answer">A.もちろんございます！気軽にお問い合わせください！</p>
            </li>
            <li class="p-qa__content-item">
              <p class="p-qa__question">Q.実績ってどこで見れますか？</p>
              <p class="p-qa__answer">A.実績は実績管理用アカウントの@nvy0ly または #ペコちゃん実績 や@MoMoRMTresults でご確認頂けます！</p>
            </li>
            <li class="p-qa__content-item">
              <p class="p-qa__question">Q.支払い方法は何がありますか？</p>
              <p class="p-qa__answer">A.PayPay,コンビニ払い(セブン,ローソン),Amazonギフト券に対応しております！</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="p-contact">
    <div class="p-contact__inner">
      <div class="p-contact__contents">
        <h2 class="p-contact__title">▽当方のアカウントはこちらをクリック▽</h2>
        <p class="p-contact__text">お問い合わせは凍結等がない限り基本的にXのメインアカウントにて対応いたします！</p>
        <div class="p-contact__sns">
          <div class="p-contact__sns-main">
            <p class="p-contact__sns-label">代表Xアカウント<br class="u-md">（メインで対応早いです！）</p>
            <a class="p-contact__sns-icon" href="https://x.com/pero5_peko?s=21" target="_blank" rel="noreferrer">
              <figure class="p-contact__sns-icon-img">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                  alt="メインアカウント"
                  loading="lazy"
                  decoding="async" />
              </figure>
            </a>
          </div>
          <div class="p-contact__sns-row">
            <div class="p-contact__sns-item">
              <p class="p-contact__sns-label">系列アカウント①</p>
              <a class="p-contact__sns-icon" href="https://x.com/1woood?s=21" target="_blank" rel="noreferrer">
                <figure class="p-contact__sns-icon-img">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                    alt="系列アカウント1"
                    loading="lazy"
                    decoding="async" />
                </figure>
              </a>
            </div>
            <div class="p-contact__sns-item">
              <p class="p-contact__sns-label">系列アカウント②</p>
              <a class="p-contact__sns-icon" href="https://x.com/naonetweb?s=21" target="_blank" rel="noreferrer">
                <figure class="p-contact__sns-icon-img">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                    alt="系列アカウント2"
                    loading="lazy"
                    decoding="async" />
                </figure>
              </a>
            </div>
          </div>
          <div class="p-contact__sns-row">
            <div class="p-contact__sns-item">
              <p class="p-contact__sns-label">サブアカウント①</p>
              <a class="p-contact__sns-icon" href="https://x.com/zhwrh_?s=21" target="_blank" rel="noreferrer">
                <figure class="p-contact__sns-icon-img">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                    alt="サブアカウント1"
                    loading="lazy"
                    decoding="async" />
                </figure>
              </a>
            </div>
            <div class="p-contact__sns-item">
              <p class="p-contact__sns-label">サブアカウント②</p>
              <a class="p-contact__sns-icon" href="https://x.com/m1lny_?s=21" target="_blank" rel="noreferrer">
                <figure class="p-contact__sns-icon-img">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                    alt="サブアカウント2"
                    loading="lazy"
                    decoding="async" />
                </figure>
              </a>
            </div>
            <div class="p-contact__sns-item">
              <p class="p-contact__sns-label">サブアカウント③</p>
              <a class="p-contact__sns-icon" href="https://x.com/m1komochi?s=21" target="_blank" rel="noreferrer">
                <figure class="p-contact__sns-icon-img">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/x-icon.webp"
                    alt="サブアカウント3"
                    loading="lazy"
                    decoding="async" />
                </figure>
              </a>
            </div>
          </div>
          <div class="p-contact__line">
            <p class="p-contact__line-label">公式LINE</p>
            <a class="p-contact__line-icon" href="https://lin.ee/Jn86WE8" target="_blank" rel="noreferrer">
              <figure class="p-contact__line-icon-img">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/common/line-icon.webp"
                  alt="公式ライン"
                  loading="lazy"
                  decoding="async" />
              </figure>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
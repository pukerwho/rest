<h1>Мои настройки</h1>

<form method="post" action="options.php">

  <div class="tabs-setting">
    <!-- Tab One -->
    <div class="tab-setting">
      <input id="tab-one" type="radio" name="grp" checked />
      <label class="label-title" for="tab-one">Tab One</label>
      <div class="tab__content">
        Tab 1 Content
      </div>
    </div>
    <!-- Tab Two -->
    <div class="tab-setting">
      <input id="tab-two" type="radio" name="grp" />
      <label class="label-title" for="tab-two">Tab One</label>
      <div class="tab__content">
        <img src="http://sbarthel.github.io/images/img/berg.JPG" alt="mountain" />
      </div>
    </div>
    <!-- Tab Three -->
    <div class="tab-setting">
      <input id="tab-three" type="radio" name="grp" />
      <label class="label-title" for="tab-three">Tab Three</label>
      <div class="tab__content">
        Че то там
      </div>
    </div>
  </div>
  
	
  <?php settings_fields( 'my-settings-group' ); ?>
  <?php do_settings_sections( 'my-settings-group' ); ?>

  <table class="form-table">
    <tr valign="top">
    <th scope="row">Ссылка на Facebook</th>
    <td><input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" /></td>
    </tr>
       
    <tr valign="top">
    <th scope="row">Ссылка на Twitter</th>
    <td><input type="text" name="twitter_link" value="<?php echo esc_attr( get_option('twitter_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Ссылка на Google+</th>
    <td><input type="text" name="google_link" value="<?php echo esc_attr( get_option('google_link') ); ?>" /></td>
    </tr>
    
    <tr valign="top">
    <th scope="row">Ссылка на Pinterest</th>
    <td><input type="text" name="pinterest_link" value="<?php echo esc_attr( get_option('pinterest_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Код Google Analytics</th>
    <td><input type="text" name="google_analytics" value="<?php echo esc_attr( get_option('google_analytics') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Код JivoSite</th>
    <td><input type="text" name="jivosite_code" value="<?php echo esc_attr( get_option('google_analytics') ); ?>" /></td>
    </tr>
  </table>
    <?php submit_button(); ?>
</form>
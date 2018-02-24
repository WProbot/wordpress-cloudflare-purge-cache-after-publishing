function vymazatCache() {
     $ch = curl_init('https://api.cloudflare.com/client/v4/zones/***ZONEID***/purge_cache');
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
     curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
      'Content-Type:application/json',
      'X-Auth-Email:***EMAIL***',
      'X-Auth-Key:***APIKEY***'
    ) );
     curl_setopt($ch, CURLOPT_POSTFIELDS, '{"purge_everything":true}');
    
  	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $result = curl_exec($ch);
    curl_close($ch);
    wp_mail( '***EMAIL***', "File purged", $result );
}
add_action( 'publish_post', 'vymazatCache' );
add_action( 'trashed_post', 'vymazatCache' );
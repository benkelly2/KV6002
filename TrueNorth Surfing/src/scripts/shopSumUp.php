<?php
    include('sdk.js');
?>
<div id="sumup-card"></div>
<script
  type="text/javascript"
  src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"
></script>
<script type="text/javascript">
  SumUpCard.mount({
    checkoutId: '2ceffb63-cbbe-4227-87cf-0409dd191a98',
    onResponse: function (type, body) {
      console.log('Type', type);
      console.log('Body', body);
    },
  });
</script>

<?php


?>
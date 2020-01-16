var d = new Date();

prod_days = parseInt(document.getElementById('prod-display').textContent);
unprod_days = parseInt(document.getElementById('unprod-display').textContent);

today = d.getDate();
last = parseInt(document.getElementById('displaysubmitday').textContent);
submitted_today = (today == last)

last_prod = parseInt(document.getElementById('displaylastprod').textContent);




function increment(type, day, month, year) {
  today = d.getDate();
  submitted_today = (today == last);
  console.log("attempting function");
  if (submitted_today == false) {
    submitted_today = true;
    if (type == 'prod-count') {
      prod_days++;
      submitted_prod_today = true;
      document.getElementById('prod-display').textContent = prod_days;
      last_prod = 1;
    }
    if (type == 'unprod-count') {
      unprod_days++;
      submitted_unprod_today = true;
      document.getElementById('unprod-display').textContent = unprod_days;
      last_prod = 0;
    }
  } else {
    console.log("Already submitted today.")
    if (type == 'prod-count') {
      if (last_prod == 0){
        prod_days++;
        unprod_days--;
        last_prod = 1;
        console.log("Incrementing")

      }
    }
    if (type == 'unprod-count') {
      if (last_prod == 1){
        prod_days--;
        unprod_days++;
        last_prod = 0;
        console.log('decrementing')

      }
    }
    last = today
    document.getElementById('prod-display').textContent = prod_days;
    document.getElementById('unprod-display').textContent = unprod_days;
  }
  updateAll()
}

function updateAll(){
  document.getElementById('displayprodid').value = prod_days;
  document.getElementById('displayunprodid').value = unprod_days;
  document.getElementById('displaysubmitdayid').value = today;
  document.getElementById('displaylastprodid').value = last_prod

  document.getElementById('hidden-button').click()


}

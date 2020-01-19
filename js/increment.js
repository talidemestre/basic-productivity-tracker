var d = new Date();

prod_days = parseInt(document.getElementById('prod-display').textContent);
unprod_days = parseInt(document.getElementById('unprod-display').textContent);

today = d.getDate();
last = parseInt(document.getElementById('displaysubmitday').textContent);
submitted_today = (today == last)

last_prod = parseInt(document.getElementById('displaylastprod').textContent);

//document.getElementById('body').style.background = 'rgb(0,144,0)';

updateColour();

function updateColour() {
  p_count = prod_days - unprod_days;
  lowered = 255 - p_count;
  if (p_count < 0) {
    lowered = 255 + p_count;
    bg_color = 'rgb(255,' + lowered +',' +lowered+')';
  } else {
    lowered = 255 - p_count;
    bg_color = 'rgb(' + lowered +', 255,' + lowered +')';
  }
  document.getElementById('body').style.background  = bg_color;
  console.log("color shfit")
}



function increment(type, day, month, year) {
  today = d.getDate();
  submitted_today = (today == last);
  last = today;
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
    document.getElementById('prod-display').textContent = prod_days;
    document.getElementById('unprod-display').textContent = unprod_days;
  }
  updateAll()
  updateColour()
}

function updateAll(){
  document.getElementById('displayprodid').value = prod_days;
  document.getElementById('displayunprodid').value = unprod_days;
  document.getElementById('displaysubmitdayid').value = today;
  document.getElementById('displaylastprodid').value = last_prod

  document.getElementById('hidden-button').click()


}

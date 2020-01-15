var d = new Date();

prod_days = 0;
unprod_days = 0;
submitted_today=false;
submitted_prod_today = false;
submitted_unprod_today = false;


function increment(type, day, month, year) {
  if (submitted_today === false) {
    submitted_today = true;
    if (type === 'prod-count') {
      prod_days++;
      submitted_prod_today = true;
      document.getElementById('prod-count').textContent = "Productive Days: " + prod_days;
    }
    if (type === 'unprod-count') {
      unprod_days++;
      submitted_unprod_today = true;
      document.getElementById('unprod-count').textContent = "Unproductive Days: " + unprod_days;
    }
  } else {
    if (type === 'prod-count') {
      if (submitted_unprod_today){
        prod_days++;
        unprod_days--;
        submitted_unprod_today = false;
        submitted_prod_today = true;
      }
    }
    if (type === 'unprod-count') {
      if (submitted_prod_today){
        prod_days--;
        submitted_prod_today = false;
        submitted_unprod_today = true;
        unprod_days++;
      }
    }
    document.getElementById('prod-count').textContent = "Productive Days: " + prod_days;
    document.getElementById('unprod-count').textContent = "Unproductive Days: " + unprod_days;
  }
}

async function validator(idPermitido) {
  const DASHBOARD = "./../";
  const config = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
  };
  const response = await fetch(DASHBOARD, config);
  const lider = await response.json();
  console.log(lider);

  if (lider) {
    if (lider[0]["idMinisterio"] !== idPermitido) {
      location.assign("./../");
    }
  }
}

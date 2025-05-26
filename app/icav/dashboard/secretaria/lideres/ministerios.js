const apiM = "http://localhost:3000/api/ministerios/";

async function getMinisterios() {
  const response = await fetch(apiM, {
    method: "GET",
  });

  return await response.json();
}

const form = document.querySelector('#sentiment-form');
const results = document.querySelector('#sentiment-result');

form.addEventListener('submit', async (event) => {
  event.preventDefault();

  const formData = new FormData(form);
  const response = await fetch('sentiment.php', {
    method: 'POST',
    body: formData
  });
  const data = await response.text();

  results.innerHTML = data;
});

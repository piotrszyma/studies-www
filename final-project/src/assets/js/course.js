// courseId as global variable injected from backend

(() => {
  const opinionTemplate = ({ author, comment, created }) => `
  <div class="row opinion">
    <div class="col-1">
      <div class="opinion__info">
        <span class="opinion__author"> ${author} </span>
        <span class="opinion__created"> ${created} </span>
      </div>
      <div class="opinion__body"> ${comment} </div>
    </div>
  </div>
  `

  const renderOpinions = (element, opinions) => {
    element.innerHTML = `
      <div class="col-1">
        ${opinions.map(o => opinionTemplate(o)).join('\n')}
      </div>
    `;

  };

  submitHandler = ({ captcha, name, comment }) => (event) => {
    if (event.target.form.checkValidity()) {
      event.preventDefault();
      console.log("Valid!");
    }
  };

  const get = async (url) => {
    const response = await fetch(url);
    return await response.json();
  }

  window.onload = async () => {
    const data = await get(`/opinion/${courseId}`);
    const bodyElement = document.querySelector('.body');
    const submitButton = document.querySelector('.form button');

    const comment = document.querySelector('textarea[name="comment"]');
    const name = document.querySelector('input[name="name"]');
    const captcha = document.querySelector('input[name="captch"]');

    renderOpinions(bodyElement, data);

    submitButton.addEventListener('click', submitHandler({ captcha, name, comment }));

    bodyElement.classList.remove('loading');
  };
})();




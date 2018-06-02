// courseId as global variable injected from backend

(() => {

  let bodyElement;
  let submitButton;
  let formItems;
  let courseId;

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

  const renderOpinions = (opinions) => {
    bodyElement.innerHTML = `
      <div class="col-1">
        ${opinions.map(o => opinionTemplate(o)).join('\n')}
      </div>
    `;

  };

  submitHandler = (event) => {
    if (event.target.form.checkValidity()) {
      event.preventDefault();
      const formData = {};

      formItems.forEach(i => {
        formData[i.name] = i.value;
      });

      const response = post(`/opinion/${courseId}`, formData);
      console.log("Valid!");
    }
  };

  const get = async (url) => {
    const rawResponse = await fetch(url);
    return await rawResponse.json();
  }

  const post = async (url, payload) => {
    const rawResponse = await fetch(url, {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    });
    return await rawResponse.json();
  }

  window.onload = async () => {
    bodyElement = document.querySelector('.body');
    submitButton = document.querySelector('.form button');
    formItems = document.querySelectorAll('[data-type=field]');
    courseId = bodyElement.dataset.course;

    const data = await get(`/opinion/${courseId}`);
    renderOpinions(data);

    submitButton.addEventListener('click', submitHandler);

    bodyElement.classList.remove('loading');
  };
})();




const loadData = async () => {

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');
    

    const response = await fetch(`http://localhost:8000/api/patterns/detail.php?id=${id}`);
    const data = await response.json();

    const main = document.querySelector('main');

    const title = document.createElement('h1');
    title.textContent = data.title;
    main.appendChild(title);
  

    const img = document.createElement('img');
    img.src = `/assets/pics/pattern_img/${data.pic}`;
    img.alt = data.title;
    main.appendChild(img);
  

    const text = document.createElement('p');
    text.innerText = data.text;
    main.appendChild(text);
  
    if (data.type) {
      const type = document.createElement('p');
      type.innerText = "Type : " + data.type;
      main.appendChild(type);
    }
  
    if (data.difficulty) {
      const difficulty = document.createElement('p');
      difficulty.innerText = "Difficulté : " + data.difficulty;
      main.appendChild(difficulty);
    }
  };
  
  loadData();
  
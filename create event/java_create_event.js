const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("input-file");
const imageView = document.getElementById("img-view");
inputFile.addEventListener("change",uploadImage);
function uploadImage()
{
	// bech nekhdo el image mel input 
	
	let imgLink = URL.createObjectURL(inputFile.files[0]);  //pour acceder au premier file input
	imageView.style.backgroundImage = `url(${imgLink})`;
	imageView.textContent=""; // to hide the text content
}
// category
const wrappercategory = document.querySelector(".wrapper-category"),
selectBtncategory = wrappercategory.querySelector(".select-btn-category"),
searchInpcategory = wrappercategory.querySelector("input"),
optcategory = wrappercategory.querySelector(".options-category");

let categories = ["Camping","Sport","Trip","Nigh Club"];

function addCategory() {
    categories.forEach(category => {
        // Ajouter chaque place dans le li et mettre tous les li
        let li = `<li onclick="updateNamecat(this)">${category}</li>`;
        optcategory.insertAdjacentHTML("beforeend",li);
    });
}
addCategory();
function updateNamecat(selectedLi)
{
	wrappercategory.classList.remove("active");
	selectBtncategory.firstElementChild.innerText = selectedLi.innerText;
}

searchInpcategory.addEventListener("keyup",() =>  {
	let arrc = [];
	let searchedValc = searchInpcategory.value.toLowerCase();
	// retourner toutes les pays de array qui ont au debut la valeur de searched value
	arrc = categories.filter(data =>  {
		return data.toLowerCase().startsWith(searchedValc);
	}).map(data => `<li>${data}</li>`).join("");
	optcategory.innerHTML = arrc ? arrc : `<p>Ops! Place not found</p>`;
});
selectBtncategory.addEventListener("click", () => {
    wrappercategory.classList.toggle("active");
});

// location 
const wrapper = document.querySelector(".wrapper"),
selectBtn = wrapper.querySelector(".select-btn"),
searchInp = wrapper.querySelector("input"),
opt = wrapper.querySelector(".options");

let countries = ["Ain Zaghwen", "Ain Drahem", "Beja", "Bizert center", "Bizert Cap Zbib", "Djerba Houmt Souk", "Djerb Midoun", "Djerba Zone Touristique",
                 "Dar Zaghwen", "El jam", "Hamemet", "Hawaria", "Jandouba", "Klibia", "Matmata", "Mestir", "Nabel", "Tunis Marsa", "Tunis Manzeh 7",
                 "Tunis Gammarth", "Tunis Lac 1", "Sousse kantawi", "Sousse Center", "Zarzis"];

function addCountry(selectedCountry) {
	opt.innerHTML="";
    countries.forEach(country => {
    	// if selected country and country value is same then add selected class
    	let isSelected = country == selectedCountry ? "selected" : "";
        // Ajouter chaque place dans le li et mettre tous les li
        let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
        opt.insertAdjacentHTML("beforeend",li);
    });
}
addCountry();
function updateName(selectedLi)
{
	searchInp.value= "";
	addCountry(selectedLi.innerText);
	wrapper.classList.remove("active");
	selectBtn.firstElementChild.innerText = selectedLi.innerText;
}

searchInp.addEventListener("keyup",() =>  {
	let arr = [];
	let searchedVal = searchInp.value.toLowerCase();
	// retourner toutes les pays de array qui ont au debut la valeur de searched value
	arr = countries.filter(data =>  {
		return data.toLowerCase().startsWith(searchedVal);
	}).map(data => `<li onclick="updateName(this)">${data}</li>`).join("");
	opt.innerHTML = arr ? arr : `<p>Ops! Place not found</p>`;
});
selectBtn.addEventListener("click", () => {
    wrapper.classList.toggle("active");
});



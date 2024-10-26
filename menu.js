// Open the modal and close Modal
let selectedIndex = 0; // Track the currently selected product index
let selectedSize = "Grande"; // Default size

function openModal(index) {
  selectedIndex = index; // Set the index of the selected coffee
  document.getElementById("coldCoffeeModal").style.display = "block";
  document.getElementById("modal-title").textContent =
    coldCoffeeData[selectedIndex].name; // Update modal title
  selectSize(selectedSize); // Display the default size description
}

window.onclick = function (event) {
  if (event.target == document.getElementById("coldCoffeeModal")) {
    document.getElementById("coldCoffeeModal").style.display = "none";
  }
};
// To Display Different Description in different modal

function selectSize(size) {
  selectedSize = size; // Update the selected size
  const coffeeData = coldCoffeeData[selectedIndex]; // Get the data for the selected coffee
  const descParagraph = document.getElementById("size-description"); // Update the description
  if (size === "Tall") {
    descParagraph.textContent = coffeeData["tall-desc"];
  } else if (size === "Grande") {
    descParagraph.textContent = coffeeData["grande-desc"];
  } else if (size === "Venti") {
    descParagraph.textContent = coffeeData["large-desc"];
  }

  // Visually highlight the selected button
  const buttons = document.querySelectorAll(".size-btn");
  buttons.forEach((btn) => btn.classList.remove("selected"));
  event.target.classList.add("selected");
}

// Function to handle the quantity changes and add to cart
document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".card");

  cards.forEach((card) => {
    const minusBtn = card.querySelector(".minus");
    const plusBtn = card.querySelector(".plus");
    const quantityValue = card.querySelector(".quantity-value");
    const cartBtn = card.querySelector(".cart-btn");

    let quantity = 1; // Set the default quantity to 1
    updateQuantity(); // Ensure the default value is displayed

    minusBtn.addEventListener("click", function () {
      if (quantity > 1) {
        quantity--;
        updateQuantity();
      }
    });

    plusBtn.addEventListener("click", function () {
      quantity++;
      updateQuantity();
    });

    cartBtn.addEventListener("click", function () {
      // No need to check if the quantity is greater than 1
      addToCart(card, quantity); // Pass the current card context and default quantity
    });

    function updateQuantity() {
      quantityValue.textContent = quantity; // Update the displayed quantity
    }
  });
});

function addToCart(card, quantity) {
  const productImageElement = card.querySelector(".product-image"); // Get the image element
  const productImage = productImageElement
    ? productImageElement.getAttribute("src")
    : null; // Get the image URL

  const productName = card.querySelector(".product-name").textContent; // Get the product name
  const productPrice = card.querySelector('input[name="product_price"]').value; // Get the product price

  // Log for debugging purposes
  console.log("Product Image URL:", productImage);
  console.log("Product Name:", productName);
  console.log("Product Price:", productPrice);

  if (productImage && productName && productPrice) {
    // Proceed with the fetch request
    fetch("add_to_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `product_name=${encodeURIComponent(
        productName
      )}&quantity=${quantity}&price=${encodeURIComponent(
        productPrice
      )}&product_image=${encodeURIComponent(productImage)}`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Added to cart successfully!");
          quantity = 1; // Reset quantity to 1 after adding to cart
          card.querySelector(".quantity-value").textContent = quantity;
        } else {
          alert("Failed to add to cart. Please try again.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Error:", error);
      });
  } else {
    alert("Error: Missing product data");
  }
}

// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with class 'price'
  var priceElements = document.querySelectorAll(".price");

  // Apply styles to each price element
  priceElements.forEach(function (priceElement) {
    priceElement.style.color = "#310E05";
    priceElement.style.fontWeight = "bold";
    priceElement.style.marginLeft = "10px";
    priceElement.style.fontSize = "larger";
  });
});

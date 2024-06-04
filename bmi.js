function calculateBMI() {
    const weight = parseFloat(document.getElementById("weight").value);
    const height = parseFloat(document.getElementById("height").value) / 100; // Convert cm to meters
    const bmi = weight / (height * height);
  
    const result = document.getElementById("result");
    result.innerHTML = `Your BMI is: ${bmi.toFixed(2)}`;
  }
  
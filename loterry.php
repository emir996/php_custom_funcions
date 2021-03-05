<?php 

class Lottery {
	public array $combinations = [];
	public string $errors = "";
	
	// make combination with recursvive method
	public function makeCombination(){
		
		$randNum = $this->number = rand(1, 80);
		$this->combinations[] = $randNum;
		$this->combinations = array_unique($this->combinations);
		
		if(count($this->combinations) == 7){
			return false;
		}
		
		$this->makeCombination();
		
	}
	
	public function getCombination(){
		echo implode(",",$this->combinations);
	}
	
	public function checkIsSubmitedForm(){
		return isset($_POST['btnComb']) ? TRUE : FALSE;
	}
	
	public function validateRequestedCombination(){
		$filterSameNumbers = [];
		if(isset($_POST['btnComb'])){
			$requestedComb = rtrim($_POST['comb']);
			
			$combination = explode(" ", $requestedComb);
			
			//check for same value in single array
			$combination = array_unique($combination);
			
			//check is less or more numbers in combination
			if(count($combination) !== 7){
				$this->errors = "Your combination is not good, you must provide 7 numbers and each number must be different";
				return false;
			}
			
			//check is number provided as datatype
			foreach($combination as $comb){
				$strComb = strval($comb);
				$comb = intval($comb);
				
				//$combination = [];
				if($comb == false){
					$this->errors = "You must provide only number in your combination: " . $strComb . " is not allowed";
					return false;
				}
			}
			
			return $combination;
		}
	}
	
	public function compareRequestedCombinationWithLottery(){
		$validatedCombination = $this->validateRequestedCombination();
		
		echo "Lottary combination: " . implode(",", $this->combinations) . "<br/>";
		echo "Your Combination: " . implode(",", $validatedCombination) . "<br/>";
		$result = array_intersect($this->combinations, $validatedCombination);
		
		if(count($result) == 7){
			echo "Congradulations you won lottery";
			return true;
		}
		
		if(count($result) == 0){
			echo "Sorry you didnt match any number from our lottery combination";
			return false;
		}
		
		echo "Matched: ".count($result) . "<br/>";
		echo "Matched numbers: " . implode(",", $result);
		
	}
	
	public function roll(){
		
		if($this->validateRequestedCombination() != NULL && $this->checkIsSubmitedForm() == TRUE){
			$this->makeCombination();
			$this->validateRequestedCombination();
			$this->compareRequestedCombinationWithLottery();
		}
	}
	
}

$lottery = new Lottery;
$lottery->roll();
if($lottery->errors != ""){
	echo $lottery->errors;
}

?>

<html>
<body>
	<br/><br/>
	<form method="post" action="">
	<?php  ?>
		<label for="numbers">Your Combination:</label><br/>
		<input type="text" id="comb" name="comb" />
		<input id="btnComb" type="submit" name="btnComb" value="Send Combination" />
	</form>
	
	<p id="msg">Click on number to insert your combination</p>
	<p id="msg1"></p>
	<p id="msg2"></p>
	<div id ="nums" class="numbers" >
		
	</div>
	
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const btn = document.getElementById('btnComb');
			const msg = document.getElementById('msg');
			const msg1 = document.getElementById('msg1');
			const msg2 = document.getElementById('msg2');
			
			const numberDiv = document.getElementById('nums');
			const combination = document.getElementById('comb');
			
			let countEachCombination = 0;
			let combinations = [];
			
			numberDiv.style.width = 325 + 'px';
			numberDiv.style.position = 'relative';
			
			btn.disabled = true;
			
			for(let i = 1; i <= 80; i++){
				const createNum = document.createElement('div');
				createNum.style.display = 'inline-block';
				createNum.classList.add('number');
				createNum.classList.add('unselected');
				createNum.style.cursor = 'pointer';
				createNum.innerText = i;
				createNum.style.width = 18 + 'px';
				createNum.style.padding = 5 + 'px';
				createNum.style.border = 1 + 'px solid black';
				numberDiv.appendChild(createNum);
				createNum.addEventListener('click', function(e){
					
					let number = e.target;
					let isSelected = e.srcElement.classList[1];
					let numberValue = parseInt(number.innerText);
					
					if(isSelected == 'unselected'){
						
						number.classList.remove('unselected');
						number.classList.add('selected');
						number.style.background = 'red';
						number.style.color = 'white';
						combination.value += numberValue + ' ';
						countEachCombination++;
						combinations.push(numberValue);
						
					}
					
					if(isSelected == 'selected'){
						number.classList.remove('selected');
						number.classList.add('unselected');
						number.style.background = 'white';
						number.style.color = 'black';
						
						let trimDeselected = combination.value.replace(numberValue + ' ','');
						combination.value = trimDeselected;
						countEachCombination--;
						combinations = [];
						combinations = combination.value.split(" ");
						combinations.pop();
					}
					
					
					
					if(countEachCombination >= 7){
						
						for(let i = 1; i < numberDiv.childNodes.length; i++){
							
							if(numberDiv.childNodes[i].classList[1] == "unselected"){
								
								numberDiv.childNodes[i].style.display="none";
							}
						}
						btn.disabled = false;
						
						msg1.innerText = 'Your combination is done';
						msg2.innerText = 'If you want to change combination click on any number to change';
						msg.innerText = '';
						
					} else {
						
						for(let i = 1; i < numberDiv.childNodes.length; i++){
							numberDiv.childNodes[i].style.display="inline-block";
						}
						
						btn.disabled = true;
						
						msg1.innerText = "";
						msg2.innerText = "";
						
					}
					
				});
				
			}
			
		});
	</script>
</body>
</html>

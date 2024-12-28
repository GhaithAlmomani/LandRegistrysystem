<form id="authorizationForm">
    <!-- <label for="employeeAddress">Employee Address:</label>
    <input type="text" id="employeeAddress" required><br><br>

    <label for="isAuthorized">Is Authorized:</label>
    <select id="isAuthorized" required>
        <option value="true">True</option>
        <option value="false">False</option>
    </select><br><br>

    <button type="submit">Submit</button>



    <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
 -->

    <div class="mb-3">
        <label for="employeeAddress" class="form-label">Employee Address</label>
        <input type="text" class="form-control" id="employeeAddress" aria-describedby="employeeAddressHelp" required>
        <div id="employeeAddressHelp" class="form-text">Enter The Employee Address</div>
    </div>
    <select id="isAuthorized" class="form-select" aria-label="Default select example" required>
        <option value="true">True</option>
        <option value="false">False</option>
    </select><br><br>

    <!-- <button type="submit">Submit</button> -->
    <button type="submit" class="btn btn-primary">Set Employee Authorization</button>




</form>

<p id="status"></p>

<script>

    // Initialize Web3
    if (typeof window.ethereum !== 'undefined') {
        const web3 = new Web3(window.ethereum);

        // Prompt user to connect their wallet
        window.ethereum.request({ method: 'eth_requestAccounts' });

        // Get the smart contract
        const contract = new web3.eth.Contract(contractABI, contractAddress);

        // Handle form submission
        document.getElementById('authorizationForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const employeeAddress = document.getElementById('employeeAddress').value;
            const isAuthorized = document.getElementById('isAuthorized').value === 'true';

            try {
                const accounts = await web3.eth.getAccounts();
                const sender = accounts[0];

                // Call the setEmployeeAuthorization function
                await contract.methods.setEmployeeAuthorization(employeeAddress, isAuthorized).send({ from: sender });

                document.getElementById('status').textContent = "Authorization updated successfully!";
            } catch (error) {
                console.error(error);
                document.getElementById('status').textContent = "Error: " + error.message;
            }
        });
    } else {
        document.getElementById('status').textContent = "Please install MetaMask to use this feature.";
    }
</script>
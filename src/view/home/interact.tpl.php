
    <script src="https://cdn.jsdelivr.net/npm/ethers/dist/ethers.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1, h2 {
            color: #444;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        input {
            margin: 5px 0;
            padding: 8px;
            width: calc(100% - 20px);
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        div#propertyInfo {
            margin-top: 10px;
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
<section>
<h1>Property Registry Interaction</h1>

<!-- Connect Button -->
<button id="connectWallet">Connect Wallet</button>

<!-- Property Functions -->
<h2>Register a Property</h2>
<input type="number" id="propertyId" placeholder="Property ID">
<input type="text" id="propertyOwner" placeholder="Owner Address">
<input type="text" id="propertyDescription" placeholder="Description">
<button id="registerProperty">Register Property</button>

<h2>Get Property Info</h2>
<input type="number" id="propertyIdToFetch" placeholder="Property ID">
<button id="getPropertyInfo">Get Info</button>
<div id="propertyInfo"></div>

<h2>Transfer Ownership</h2>
<input type="number" id="transferId" placeholder="Property ID">
<input type="text" id="newOwner" placeholder="New Owner Address">
<button id="transferOwnership">Transfer Ownership</button>

<script>
    let contract;
    let signer;

    // Replace with your deployed contract address and ABI
    const contractAddress = "0xc03b3b1C4eFb5036feb1a966f570949648eDD230";
    const contractABI = [
        {
            "inputs": [],
            "stateMutability": "nonpayable",
            "type": "constructor"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "employee",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "bool",
                    "name": "isAuthorized",
                    "type": "bool"
                }
            ],
            "name": "EmployeeAuthorizationUpdated",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "id",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "previousOwner",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "newOwner",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "authorizedEmployee",
                    "type": "address"
                }
            ],
            "name": "OwnershipTransferred",
            "type": "event"
        },
        {
            "anonymous": false,
            "inputs": [
                {
                    "indexed": false,
                    "internalType": "uint256",
                    "name": "id",
                    "type": "uint256"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "indexed": false,
                    "internalType": "address",
                    "name": "registeredBy",
                    "type": "address"
                }
            ],
            "name": "PropertyRegistered",
            "type": "event"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                },
                {
                    "internalType": "address",
                    "name": "_owner",
                    "type": "address"
                },
                {
                    "internalType": "string",
                    "name": "_description",
                    "type": "string"
                }
            ],
            "name": "registerProperty",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "_employee",
                    "type": "address"
                },
                {
                    "internalType": "bool",
                    "name": "_isAuthorized",
                    "type": "bool"
                }
            ],
            "name": "setEmployeeAuthorization",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                },
                {
                    "internalType": "address",
                    "name": "_newOwner",
                    "type": "address"
                }
            ],
            "name": "transferOwnership",
            "outputs": [],
            "stateMutability": "nonpayable",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "admin",
            "outputs": [
                {
                    "internalType": "address",
                    "name": "",
                    "type": "address"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "address",
                    "name": "",
                    "type": "address"
                }
            ],
            "name": "authorizedEmployees",
            "outputs": [
                {
                    "internalType": "bool",
                    "name": "",
                    "type": "bool"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "getAllProperties",
            "outputs": [
                {
                    "components": [
                        {
                            "internalType": "uint256",
                            "name": "id",
                            "type": "uint256"
                        },
                        {
                            "internalType": "address",
                            "name": "owner",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "description",
                            "type": "string"
                        }
                    ],
                    "internalType": "struct PropertyRegistry.Property[]",
                    "name": "",
                    "type": "tuple[]"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                }
            ],
            "name": "getPropertyById",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                },
                {
                    "internalType": "address",
                    "name": "",
                    "type": "address"
                },
                {
                    "internalType": "string",
                    "name": "",
                    "type": "string"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [],
            "name": "getPropertyCount",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "",
                    "type": "uint256"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        },
        {
            "inputs": [
                {
                    "internalType": "uint256",
                    "name": "_id",
                    "type": "uint256"
                }
            ],
            "name": "getPropertyInfo",
            "outputs": [
                {
                    "internalType": "uint256",
                    "name": "id",
                    "type": "uint256"
                },
                {
                    "internalType": "address",
                    "name": "owner",
                    "type": "address"
                },
                {
                    "internalType": "string",
                    "name": "description",
                    "type": "string"
                },
                {
                    "internalType": "bool",
                    "name": "isAuthorizedForTransfer",
                    "type": "bool"
                }
            ],
            "stateMutability": "view",
            "type": "function"
        }
    ]
    // Paste ABI here

    // Connect to Ethereum wallet

        async function connectWallet() {
            const status = document.getElementById('status');
            const button = document.querySelector('.connect-button');

            if (typeof window.ethereum !== 'undefined') {
                try {
                    const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
                    const account = accounts[0];
                    status.innerHTML = `Connected: ${account.substring(0, 6)}...${account.substring(38)}`;
                    button.classList.add('connected');
                    button.innerHTML = `
                        <svg class="metamask-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 318.6 318.6">
                            <path fill="#E2761B" stroke="#E2761B" stroke-linecap="round" stroke-linejoin="round" d="M274.1 35.5l-99.5 73.9L193 51.6z"/>
                            <path fill="#E4761B" stroke="#E4761B" stroke-linecap="round" stroke-linejoin="round" d="M44.4 35.5l98.7 74.6-17.5-58.3zm193.9 171.3l-26.5 40.6 56.7 15.6 16.3-55.3zm-204.4.9L50.1 263l56.7-15.6-26.5-40.6z"/>
                        </svg>
                        Connected
                    `;
                } catch (error) {
                    status.innerHTML = 'Error connecting to MetaMask';
                }
            } else {
                status.innerHTML = 'Please install MetaMask';
                window.open('https://metamask.io/download.html', '_blank');
            }
        }


    // Register Property
    document.getElementById("registerProperty").addEventListener("click", async () => {
        const id = document.getElementById("propertyId").value;
        const owner = document.getElementById("propertyOwner").value;
        const description = document.getElementById("propertyDescription").value;

        if (contract) {
            try {
                const tx = await contract.registerProperty(id, owner, description);
                await tx.wait();
                alert("Property registered successfully!");
            } catch (err) {
                console.error("Error registering property:", err);
            }
        } else {
            alert("Connect your wallet first.");
        }
    });

    // Get Property Info
    document.getElementById("getPropertyInfo").addEventListener("click", async () => {
        const id = document.getElementById("propertyIdToFetch").value;

        if (contract) {
            try {
                const propertyInfo = await contract.getPropertyInfo(id);
                document.getElementById("propertyInfo").innerText = `
            ID: ${propertyInfo.id}, Owner: ${propertyInfo.owner},
            Description: ${propertyInfo.description},
            Authorized: ${propertyInfo.isAuthorizedForTransfer}
          `;
            } catch (err) {
                console.error("Error fetching property info:", err);
            }
        } else {
            alert("Connect your wallet first.");
        }
    });

    // Transfer Ownership
    document.getElementById("transferOwnership").addEventListener("click", async () => {
        const id = document.getElementById("transferId").value;
        const newOwner = document.getElementById("newOwner").value;

        if (contract) {
            try {
                const tx = await contract.transferOwnership(id, newOwner);
                await tx.wait();
                alert("Ownership transferred successfully!");
            } catch (err) {
                console.error("Error transferring ownership:", err);
            }
        } else {
            alert("Connect your wallet first.");
        }
    });
</script>
</section>>
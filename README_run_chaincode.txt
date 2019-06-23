Deploy the chaincode in Febric Network, follow the commands below. Run all the command in AWS Cloud9 terminal

> ssh ec2-user@ec2-3-85-245-111.compute-1.amazonaws.com -i ~/agrofoodnet-keypair.pem

> cd ~
git clone https://github.com/AgroFood/SOMO.git

> cd ~/non-profit-blockchain/ngo-fabric
source fabric-exports.sh

> cat ~/peer-exports.sh

> source ~/peer-exports.sh

> docker inspect cli

> cd ~
mkdir -p ./fabric-samples/chaincode/chaincode
cp ./SOMO/agrofood/src* ./fabric-samples/chaincode/chaincode -r

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" -e "CORE_PEER_ADDRESS=$PEER"  \
    cli peer chaincode install -n chaincode -l node -v v0 -p /opt/gopath/src/github.com/chaincode

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" -e "CORE_PEER_ADDRESS=$PEER"  \
    cli peer chaincode instantiate -o $ORDERER -C mychannel -n chaincode -v v0 -c '{"Args":["init"]}' --cafile /opt/home/managedblockchain-tls-chain.pem --tls

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_ADDRESS=$PEER" -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" \
    cli peer chaincode query -C mychannel -n chaincode -c '{"Args":["queryAllCustomer"]}'

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_ADDRESS=$PEER" -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" \
    cli peer chaincode invoke -C mychannel -n chaincode \
    -c  '{"Args":["createCustomer","{\"customerUserName\": \"edge\", \"email\": \"edge@def.com\", \"registeredDate\": \"2018-10-22T11:52:20.182Z\"}"]}' -o $ORDERER --cafile /opt/home/managedblockchain-tls-chain.pem --tls

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_ADDRESS=$PEER" -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" \
    cli peer chaincode invoke -C mychannel -n chaincode \
    -c  '{"Args":["createCustomer","{\"customerUserName\": \"braendle\", \"email\": \"braendle@def.com\", \"registeredDate\": \"2018-11-05T14:31:20.182Z\"}"]}' -o $ORDERER --cafile /opt/home/managedblockchain-tls-chain.pem --tls

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_ADDRESS=$PEER" -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" \
    cli peer chaincode query -C mychannel -n chaincode -c '{"Args":["queryAllCustomer"]}'

> docker exec -e "CORE_PEER_TLS_ENABLED=true" -e "CORE_PEER_TLS_ROOTCERT_FILE=/opt/home/managedblockchain-tls-chain.pem" \
    -e "CORE_PEER_ADDRESS=$PEER" -e "CORE_PEER_LOCALMSPID=$MSP" -e "CORE_PEER_MSPCONFIGPATH=$MSP_PATH" \
    cli peer chaincode query -C mychannel -n chaincode -c '{"Args":["queryCustomer","{\"customerUserName\": \"edge\"}"]}'

const shim = require('fabric-shim');
const util = require('util');

var Chaincode = class {
        Init(stub) {
                return stub.putState('Key', Buffer.from('Value'))
                        .then(() => {
                                console.info('Chaincode up and running');
                                return shim.success();
                        }, () => {
                                return shim.error();
                        });
        }

        Invoke(stub) {
                console.info('Transaction ID: ' + stub.getTxID());
                console.info(util.format('Args: %j', stub.getArgs()));

                let ret = stub.getFunctionAndParameters();
                console.info('Calling function: ' + ret.fcn);

                return stub.getState('Key')
                .then((value) => {
                        if (value.toString() === 'Value') {
                                console.info(util.format('successfully retrieved value "%j" for the key "Key"', value ));
                                return shim.success();
                        } else {
                                console.error('Failed to retrieve Key or the retrieved value is not expected: ' + value);
                                return shim.error();
                        }
                });
        }
};

shim.start(new Chaincode());


(function () {
    "use strict";
    var options = {};
    var notifier = new AWN(options);
    notifier.success("This Is An Example Of Success");
    console.log("test");
    // /* Basic notifications */
    // document.querySelector("#basic").addEventListener("click", function () {
    //     notifier.tip("This is an example of tip");
    // });

    // /* Async notifications */
    // document
    //     .querySelector("#async-error")
    //     .addEventListener("click", function () {
    //         notifier.async(Promise.reject("some error"));
    //     });
    // /* Async notifications */
    // document
    //     .querySelector("#async-success")
    //     .addEventListener("click", function () {
    //         notifier.async(Promise.resolve("some message"));
    //     });

    // /* Info notifications */
    // document.querySelector("#info").addEventListener("click", function () {
    //     notifier.info("This Is An Example Of Info");
    // });

    /* Success notifications */
    document.querySelector("#success").addEventListener("click", function () {
        notifier.success("This Is An Example Of Success");
    });

    /* Warning notifications */
    document.querySelector("#warning").addEventListener("click", function () {
        notifier.warning("This Is An Example Of Warning");
    });

    /* Error notifications */
    document.querySelector("#error").addEventListener("click", function () {
        notifier.alert("This Is An Example Of Error");
    });
});

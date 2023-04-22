/**
 * Stylo (client side).
 * @type {{}}
 */
const Stylo = {
    Trigger: {
        List: [],

        initialize: function ()
        {
            $('.stylo .button-trigger').click(function () {
                const target = $(this);
                const data = target.data('key');
                Stylo.Trigger.List.forEach(element => element(data, target));
            });
        },

        /**
         * f(data:string, target:jQuery)
         */
        add: function (f)
        {
            // @todo: check 'f' is function
            Stylo.Trigger.List.push(f);
        }
    }
};
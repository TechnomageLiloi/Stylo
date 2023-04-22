/**
 * Stylo (client side).
 *
 * @type {{}}
 */
const Stylo = {
    Trigger: {
        List: [],

        /**
         * Stylo trigger initialize.
         */
        initialize: function ()
        {
            $('.stylo .button-trigger').click(function () {
                const target = $(this);
                const data = target.data('key');
                Stylo.Trigger.List.forEach(element => element(data, target));
            });
        },

        /**
         * Add trigger function in List.
         *
         * f(data:string, target:jQuery)
         */
        add: function (f)
        {
            // @todo: check 'f' is function
            Stylo.Trigger.List.push(f);
        }
    }
};
// For God so loved the world, that He gave His only begotten Son, that all who belive in Him should not perish but have everlasting life

/**
 * BLOCK: oo1b-aleluya
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-oo-donation-aleluya', {
  // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
  title: __( 'Open Orphanage Donation Block ✝' ), // Block title.
  icon: 'heart', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
  category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
  keywords: [
    __( 'Open Orphanage' ),
    __( 'Orphanage' ),
    __( 'Aleluya' ),
    __( 'Donation' ),
    __( 'Sponsor' ),
  ],
  attributes: {
    'purpose_aleluya': {type: 'string'},
    'expandable_aleluya': {type: 'string'},
    //'color_aleluya': {type: 'string', source: "meta", meta: 'color_aleluya'}

  },


  // Thank You Jesus for https://getflywheel.com/layout/wordpress-gutenberg-blocks-custom/
  /**
   * The edit function describes the structure of your block in the context of the editor.
   * This represents what the editor will render when the block is used.
   *
   * The "edit" property must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   */
  edit: function( props_aleluya ) {

    function updatePurpose_aleluya(event_aleluya) {
      var val_aleluya = event_aleluya.target.value;
      props_aleluya.setAttributes({purpose_aleluya: val_aleluya})
    }

    function updateExpandable_aleluya(event_aleluya) {
      props_aleluya.setAttributes({expandable_aleluya: event_aleluya.target.value})
    }
    /*function updateColor_aleluya(value_aleluya) {
      props_aleluya.setAttributes({color_aleluya: value_aleluya.hex})
    }*/
    return (
      <div class="oo_donation_block_editor_aleluya">
        <h3>🕆 Donate For {props_aleluya.attributes.purpose_aleluya || "Cause"}</h3>
        <table>
          <tr><td>Purpose: </td><td><input onChange={updatePurpose_aleluya} value={props_aleluya.attributes.purpose_aleluya} type="text"/></td></tr>
          <tr><td>Expandable:  </td><td>
            <select onChange={updateExpandable_aleluya} value={props_aleluya.attributes.expandable_aleluya}>
              <option value="yes">yes</option>
              <option value="no">no</option>
            </select>
          </td></tr>
        </table>

      </div>
    );
    // React.createElement("input", { type: "text", value: props_aleluya.attributes.purpose_aleluya, onChange: updatePurpose_aleluya }),
     // React.createElement(wp.components.ColorPicker, { color_aleluya: props_aleluya.attributes.color, onChangeComplete: updateColor_aleluya })

  },

  /**
   * The save function defines the way in which the different attributes should be combined
   * into the final markup, which is then serialized by Gutenberg into post_content.
   *
   * The "save" property must be specified and must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   */
  save: function( props_aleluya ) {
    return (
      <div class="oo_donation_block_aleluya"> 
        [oo_donation_block_aleluya purpose_aleluya="{props_aleluya.attributes.purpose_aleluya}" expandable_aleluya="{props_aleluya.attributes.expandable_aleluya}"/]        
      </div>
    );
  },
} );

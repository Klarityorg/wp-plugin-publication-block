import './style.scss';
import './editor.scss';

const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;

const el = wp.element.createElement;
const iconEl = el('svg', { width: 128, height: 128, viewBox: "0 0 128 128" },
	el('rect', { x: 0, y: 0, width: 128, height: 128, stroke: "white" }),
	el('path', { d: "M41.7607 39.0615H52.8432V60.866L73.2637 39.0615H86.6547L66.1434 60.2237L87.5885 88.9388H74.2753L58.66 67.706L52.8432 73.6982V88.9388H41.7607V39.0615Z", fill: "white" })
);

registerBlockType('klarity/klarity-publication-block', {
	title: __('Publication block'),
	icon: iconEl,
	category: 'layout',
	attributes: {
		category: {
			type: 'string',
			default: ''
		},
		title: {
			type: 'string',
			default: ''
		},
		description: {
			type: 'string',
			default: ''
		},
		button_left_text:{
			type: 'string',
			default: 'Download'
		},
		button_left_text_color:{
			type: 'string',
			default: '#ffffff'
		},
		button_left_url:{
			type: 'string',
			default: ''
		},
		button_left_background_color:{
			type: 'string',
			default: '#808080'
		},
		button_right_text:{
			type: 'string',
			default: 'Share'
		},
		button_right_text_color:{
			type: 'string',
			default: '#ffffff'
		},
		button_right_url:{
			type: 'string',
			default: ''
		},
		button_right_background_color:{
			type: 'string',
			default: '#808080'
		},
	},
	edit: props => {
		const {attributes: {category, title, description, button_left_text, button_left_text_color, button_left_url, button_left_background_color, button_right_text, button_right_text_color, button_right_url, button_right_background_color}, setAttributes} = props;
		const setCategory = event => {
		  const selected = event.target;
		  setAttributes({category: selected.value})
		  event.preventDefault();
		};
		const setTitle = event => {
		  const selected = event.target;
		  setAttributes({title: selected.value})
		  event.preventDefault();
		};
		const setDescription = event => {
		  const selected = event.target;
		  setAttributes({description: selected.value})
		  event.preventDefault();
		};
		const setButtonLeftText = event => {
			const selected = event.target;
			setAttributes({button_left_text: selected.value})
			event.preventDefault();
		};
		const setButtonLeftTextColor = event => {
			const selected = event.target;
			setAttributes({button_left_text_color: selected.value})
			event.preventDefault();
		};
		const setButtonLeftUrl = event => {
			const selected = event.target;
			setAttributes({button_left_url: selected.value})
			event.preventDefault();
		};
		const setButtonLeftBackgroundColor = event => {
			const selected = event.target;
			setAttributes({button_left_background_color: selected.value})
			event.preventDefault();
		};
		const setButtonRightText = event => {
			const selected = event.target;
			setAttributes({button_right_text: selected.value})
			event.preventDefault();
		};
		const setButtonRightTextColor = event => {
			const selected = event.target;
			setAttributes({button_right_text_color: selected.value})
			event.preventDefault();
		};
		const setButtonRightUrl = event => {
			const selected = event.target;
			setAttributes({button_right_url: selected.value})
			event.preventDefault();
		};
		const setButtonRightBackgroundColor = event => {
			const selected = event.target;
			setAttributes({button_right_background_color: selected.value})
			event.preventDefault();
		};
		return<div class="input-publication-card">
			<div>
				<label htmlFor="category-input">Category:</label>
				<input id="category-input" type="string" value={category} onChange={setCategory}/>
			</div>
			<div>
				<label htmlFor="title-input">Title:</label>
				<input id="title-input" type="string" value={title} onChange={setTitle}/>
			</div>
			<div>
				<label htmlFor="description-input">Description:</label>
				<textarea id="description-input" rows="4" value={description} onChange={setDescription}>
					{description}
				</textarea>
			</div>
			<div>
				<label htmlFor="button-left-text-input">Button left text:</label>
				<input id="button-left-text-input" type="string" value={button_left_text} onChange={setButtonLeftText}/>
			</div>
			<div>
				<label htmlFor="button-left-color-text-input">Button left text color:</label>
				<input id="button-left-text-color-input" type="string" value={button_left_text_color} onChange={setButtonLeftTextColor}/>
			</div>
			<div>
				<label htmlFor="button-left-url-input">Button left url:</label>
				<input id="button-left-url-input" type="string" value={button_left_url} onChange={setButtonLeftUrl}/>
			</div>
			<div>
				<label htmlFor="button-left-backgournd-color-input">Button left background color:</label>
				<input id="button-left-backgournd-color-input" type="string" value={button_left_background_color} onChange={setButtonLeftBackgroundColor}/>
			</div>
			<div>
				<label htmlFor="button-right-text-input">Button right text:</label>
				<input id="button-right-text-input" type="string" value={button_right_text} onChange={setButtonRightText}/>
			</div>
			<div>
				<label htmlFor="button-right-color-text-input">Button right text color:</label>
				<input id="button-right-text-color-input" type="string" value={button_right_text_color} onChange={setButtonRightTextColor}/>
			</div>
			<div>
				<label htmlFor="button-right-url-input">Button right url:</label>
				<input id="button-right-url-input" type="string" value={button_right_url} onChange={setButtonRightUrl}/>
			</div>
			<div>
				<label htmlFor="button-right-backgournd-color-input">Button right background color:</label>
				<input id="button-right-backgournd-color-input" type="string" value={button_right_background_color} onChange={setButtonRightBackgroundColor}/>
			</div>
	</div>;
	},
	save: props => {
		return null;
	},
});

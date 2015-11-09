var Header = React.createClass({
	render: function() {
		var bgImg= {backgroundImage: "url(" + this.props.imgSrc + ")"};
		if(this.props.imgSrc) {
			return (
				<div className="NQ-header">
					<div className="header-image" style={bgImg} />
					<div className="header-container">
						<div className="header-title">
							{this.props.title}
						</div>
						<div className="header-sub-title">
							{this.props.subTitle}
						</div>
					</div>
				</div>
			);
		}
		else {
			return (
				<div className="NQ-header">
					<div className="header-container">
						<div className="header-title">
							{this.props.title}
						</div>
						<div className="header-sub-title">
							{this.props.subTitle}
						</div>
					</div>
				</div>
			);
		}
	}
});

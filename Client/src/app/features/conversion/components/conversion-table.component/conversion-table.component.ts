import { Component, input, OnInit } from '@angular/core';
import { ConversionResult } from '../../../../models/conversion-result.model';

@Component({
  selector: 'app-conversion-table',
  imports: [],
  templateUrl: './conversion-table.component.html',
  styleUrl: './conversion-table.component.scss',
})
export class ConversionTableComponent{
  conversionResult = input<ConversionResult>();
}

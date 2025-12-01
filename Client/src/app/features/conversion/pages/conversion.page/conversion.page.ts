import { Component, signal } from '@angular/core';
import { ApiService } from '../../../../services/api.service';
import { ConversionResult } from '../../../../models/conversion-result.model';
import { ConversionFormComponent } from '../../components/conversion-form.component/conversion-form.component';
import { ConversionTableComponent } from "../../components/conversion-table.component/conversion-table.component";

@Component({
  selector: 'app-conversion.page',
  imports: [ConversionFormComponent, ConversionTableComponent],
  templateUrl: './conversion.page.html',
  styleUrl: './conversion.page.scss',
})
export class ConversionPage{
  amount: number | null = null;
  conversionResult = signal<ConversionResult|undefined>(undefined);

  constructor(private apiService: ApiService){}

  getConversionFromPlnToUsdEurChf(amount: number){
    this.apiService.getConversionFromPlnToUsdEurChf(amount).subscribe({
      next: response => {
        response.rates = response.rates.sort((a, b) => a.value - b.value);
        this.conversionResult.set(response);
      },
      error: err => console.error('Error occurred while fetching conversion data:', err)
    });
  }
}
